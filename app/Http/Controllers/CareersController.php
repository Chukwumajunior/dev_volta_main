<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CareerApplication;
use App\Models\Post;
use App\Models\User;
use App\Models\ApplicationWindow;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Providers\ApplicationWindowService;
use Illuminate\Support\Facades\Mail;


class CareersController extends Controller
{
    public function submitForm(Request $request, ApplicationWindowService $windowService)
    {
        try {
            $validated = $request->validate([
                'first_name' => 'required|string',
                'last_name' => 'required|string',
                'email' => 'required|email',
                'number' => 'required|string',
                'career' => 'required|string',
                'gender' => 'required|string',
                'residential_city' => 'required|string',
                'age' => 'required|integer|min:15',
                'employment_status' => 'required|string',
            ]);

            $authUser = auth()->user();
            $existingUser = User::where('email', $validated['email'])->first();

            if ($authUser) {
                if ($authUser->role !== 'admin' && strtolower($authUser->email) !== strtolower($validated['email'])) {
                    return back()->withInput()->withErrors(['email' => 'You can only apply for yourself.']);
                }

                if ($authUser->role !== 'admin' && $existingUser) {
                    $expectedName = $validated['first_name'] . ' ' . $validated['last_name'];
                    $isMismatch = (
                        $existingUser->name !== $expectedName ||
                        $existingUser->phone !== $validated['number']
                    );

                    if ($isMismatch) {
                        return back()->withInput()->withErrors([
                            'details' => 'You cannot change your name or phone number. Only career, age, and employment status can be different.'
                        ]);
                    }
                }
            }

            if ($existingUser) {
                $alreadyApplied = CareerApplication::where('user_id', $existingUser->id)
                    ->where('career', $validated['career'])
                    ->exists();

                if ($alreadyApplied) {
                    return back()->withInput()->withErrors([
                        'career' => 'You have already applied for this course.'
                    ]);
                }
            }

            $windowStatus = $windowService->getWindowStatus();

            if (!$windowStatus['active']) {
                return back()->withInput()->withErrors([
                    'batch' => $windowStatus['message']
                ]);
            }

            $batch = $windowStatus['batch'];

            if (!$existingUser) {
                $existingUser = User::where('email', $validated['email'])->first();
                if ($existingUser) {
                    return back()->withInput()->withErrors([
                        'email' => 'This email was just used. Please try again.'
                    ]);
                }

                $existingUser = User::create([
                    'name' => $validated['first_name'] . ' ' . $validated['last_name'],
                    'email' => $validated['email'],
                    'phone' => $validated['number'],
                    'role' => 'student',
                    'password' => Hash::make($validated['last_name'] . $validated['number']),
                ]);
            }

            CareerApplication::create([
                'first_name' => $validated['first_name'],
                'last_name' => $validated['last_name'],
                'email' => $validated['email'],
                'number' => $validated['number'],
                'career' => $validated['career'],
                'gender' => $validated['gender'],
                'residential_city' => $validated['residential_city'],
                'age' => $validated['age'],
                'employment_status' => $validated['employment_status'],
                'batch' => $batch,
                'user_id' => $existingUser->id,
            ]);

            try {
                Mail::send('emails.welcome', [
                    'email' => $validated['email'],
                    'lastName' => $validated['last_name'],
                    'phoneNumber' => $validated['number'],
                ], function ($message) use ($validated) {
                    $message->to($validated['email'])
                            ->subject('Welcome to Our Platform');
                });
            } catch (\Exception $e) {
                return back()->withInput()->withErrors(['email' => 'Error sending welcome email. Please try again later.']);
            }

            return redirect()->route('career.form')->with('success', 'Application submitted successfully! Please check your email for your username and password.');

        } catch (\Illuminate\Validation\ValidationException $e) {
            return back()->withInput()->withErrors($e->errors());
        } catch (\Exception $e) {
            return back()->withInput()->withErrors(['general' => 'Something went wrong. Please try again.']);
        }
    }


    public function storeApplicationWindow(Request $request)
    {
        $validated = $request->validate([
            'batch' => 'required|string',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after:start_date',
        ]);

        ApplicationWindow::updateOrCreate(
            ['id' => 1],
            [
                'batch' => $validated['batch'],
                'start_date' => $validated['start_date'],
                'end_date' => $validated['end_date'],
            ]
        );

        return redirect()->route('admin.careers')->with('success', 'Application window saved successfully!');
    }


    public function updatePaid(Request $request)
    {
        $request->validate([
            'id' => 'required|exists:career_applications,id',
            'paid' => 'required|string',
            'payment_confirmed_at' => 'required|date',
        ]);

        $application = CareerApplication::find($request->id);

        $application->update([
            'paid' => $request->paid,
            'payment_confirmed_at' => $request->payment_confirmed_at,
        ]);

        $user = $application->user;

        try {
            Mail::send('emails.payment_acknowledgment', [
                'name' => $user->name,
                'career' => $application->career,
                'payment_status' => $request->paid,
                'payment_date' => $request->payment_confirmed_at,
            ], function ($message) use ($user) {
                $message->to($user->email)
                        ->subject('Payment Acknowledgment and Enrollment Confirmation');
            });
        } catch (\Exception $e) {
            return back()->withErrors(['email' => 'Error sending payment acknowledgment email. Please try again later.']);
        }

        return redirect()->route('admin.careers')->with('success', 'Payment status updated successfully and email sent!');
    }


    public function updateProgress(Request $request)
    {
        $request->validate([
            'career_id' => 'required|exists:career_applications,id',
            'progress' => 'required|integer|min:0|max:100',
        ]);

        try {
            $application = CareerApplication::find($request->career_id);

            if (!$application) {
                return back()->withErrors(['career_id' => 'Career application not found.']);
            }

            $application->progress = $request->progress;
            $application->save();

            $emailData = [
                'name' => $application->first_name . ' ' . $application->last_name,
                'progress' => $request->progress,
                'career' => $application->career,
            ];

            if ($request->progress == 100) {
                $emailData['message'] = 'Congratulations! You have successfully completed the ' . $application->career . ' program.';
            } else {
                $emailData['message'] = 'Your progress has been updated to ' . $request->progress . '% in the ' . $application->career . ' program.';
            }

            Mail::send('emails.progress_update', $emailData, function ($message) use ($application) {
                $message->to($application->email)
                        ->subject('Your Progress Update at Voltademy Tech Academy');
            });

            return back()->with('success', 'Progress updated and email sent successfully.');

        } catch (\Exception $e) {
            \Log::error('Error updating progress: ' . $e->getMessage());

            return back()->withErrors(['general' => 'An error occurred while updating the progress. Please try again later.']);
        }
    }



    public function viewApplications(Request $request)
    {
        $tracks = Post::where('category', 'track')->get();

        $query = CareerApplication::query();

        if ($request->filled('batch')) {
            $query->where('batch', $request->batch);
        }

        if ($request->filled('career')) {
            $query->where('career', $request->career);
        }

        if ($request->filled('date')) {
            $query->whereDate('created_at', $request->date);
        }

        if ($request->filled('email')) {
            $query->where('email', $request->email);
        }

        $applications = $query->latest()->paginate(10);

        return view('dashboard.career_applications', compact('applications', 'tracks'));
    }

    public function clearAllApplications(Request $request)

    {
        $batch = $request->input('batch');

        if ($batch) {
            CareerApplication::where('batch', $batch)->delete();
        } else {
            CareerApplication::truncate();
        }

        return redirect()->route('admin.careers')->with('success', 'Applications cleared successfully.');
    }


    public function showform()
    {
        $tracks = Post::where('category', 'track')
                      ->whereNotNull('title')
                      ->distinct()
                      ->pluck('title');
                      $window = ApplicationWindow::whereDate('start_date', '<=', now())
                      ->whereDate('end_date', '>=', now())
                      ->first();

        $window = ApplicationWindow::whereDate('start_date', '<=', now())
            ->whereDate('end_date', '>=', now())
            ->first();

        if ($window) {
            $start = \Carbon\Carbon::parse($window->start_date)->format('F j');
            $end = \Carbon\Carbon::parse($window->end_date)->format('F j, Y');
            $note = "Applications are currently open for Batch {$window->batch} ({$start} to {$end}).";
        } else {
            $nextWindow = ApplicationWindow::whereDate('start_date', '>', now())
                ->orderBy('start_date', 'asc')
                ->first();

            if ($nextWindow) {
                $nextStart = \Carbon\Carbon::parse($nextWindow->start_date)->format('F j, Y');
                $nextEnd = \Carbon\Carbon::parse($nextWindow->end_date)->format('F j, Y');
                $nextBatch = $nextWindow->batch;
                $note = "Applications are currently closed. The next application window for Batch {$nextBatch} will open on {$nextStart} and close on {$nextEnd}.";
            } else {
                $note = "Applications are currently closed. Please check back later.";
            }
        }


        return view('career-form', compact('tracks', 'note'));
    }

    public function careers()
    {
        $trackPosts = Post::where('category', 'track')->get();
        return view('careers', compact('trackPosts'));
    }

    public function send_message(Request $request)
    {
        $request->validate([
            'message' => 'required|string',
            'recipient_type' => 'required|in:all,track,student',
            'track_id' => 'nullable|exists:posts,id',
            'student_email' => 'nullable|email|exists:users,email',
        ]);

        $messageData = [
            'message' => $request->message,
            'sent_at' => now(),
        ];

        if ($request->recipient_type === 'all') {
            $students = CareerApplication::with('user')->get();
        } elseif ($request->recipient_type === 'track') {
            $track = Post::find($request->track_id);
            if (!$track) {
                return redirect()->back()->with('error', 'Selected track not found.');
            }
            $students = CareerApplication::where('career', $track->title)->with('user')->get();
        } else {
            $student = User::where('email', $request->student_email)->first();
            if (!$student) {
                return redirect()->back()->with('error', 'Student not found with that email');
            }
            $students = CareerApplication::where('user_id', $student->id)->with('user')->get();
        }

        foreach ($students as $student) {
            $messages = json_decode($student->messages, true) ?? [];
            $messages[] = $messageData;
            $student->update(['messages' => json_encode($messages)]);

            if ($student->user && $student->user->email) {
                try {
                    Mail::send('emails.student_message', ['messageBody' => $request->message], function ($mail) use ($student) {
                        $mail->to($student->user->email)
                             ->subject('New Message from Voltademy Tech Academy');
                    });
                } catch (\Exception $e) {
                    return redirect()->back()->with('error', 'Error sending email. Please try again later.');
                }
            }
        }

        return redirect()->back()->with('success', 'Message sent successfully!');
    }


}
