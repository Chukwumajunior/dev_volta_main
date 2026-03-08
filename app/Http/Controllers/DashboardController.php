<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use App\Models\Post;
use App\Models\User;
use App\Models\Message;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;


class DashboardController extends Controller
{

    public function index()
    {
        $users = User::all();

        $messages = Message::latest()->get();

        $all_posts = Post::latest()->get();

        return view('dashboard.index', compact('messages', 'all_posts', 'users'));

    }

    public function store_users(Request $request)
    {

        $validatedUser = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email',
            'phone' => 'required|string|max:15',
            'role' => 'required|string',
        ]);

        $validatedUser['password'] = Hash::make('password123');

        User::create($validatedUser);

        return redirect()->back()->with('success', 'User created successfully!');
    }

    public function store_contact(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'number' => 'required',
            'message' => 'required|string|max:1000',
        ]);

        Message::create($validatedData);

        Mail::to('info@voltafrik.com.ng')->send(new ContactMail($validatedData));

        Session::flash('success_message', 'We got your message! Please check your email for our feedback later.');

        return redirect('/')->with('success', 'Your message has been submitted successfully!');
    }


    public function destroy_contact($id)
    {
        $message = Message::findOrFail($id);
        $message->delete();

        return redirect('dashboard');
    }

    public function updateRole(Request $request, $user_id)
    {
        $request->validate([
            'role' => 'required|in:admin,writer,staff'
        ]);

        $user = User::findOrFail($user_id);
        $user->role = $request->role;
        $user->save();

        return response()->json(['success' => true]);
    }


    public function messages()
    {
        $messages = Message::latest()->get();
        return view('dashboard.index', compact('messages'));
    }



}
