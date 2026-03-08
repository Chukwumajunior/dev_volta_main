<?php

namespace App\Http\Controllers;

use App\Models\CareerApplication;
use App\Models\User;
use Illuminate\Http\Request;

class StudentDashboardController extends Controller
{
    public function index()
    {
        return $this->renderDashboard(auth()->user());
    }

    public function dashboard($id)
    {
        $student = User::findOrFail($id);
        return $this->renderDashboard($student);
    }

    private function renderDashboard(User $student)
    {
        $careerApplications = CareerApplication::where('user_id', $student->id)->get();

        $messages = collect($careerApplications)
            ->flatMap(function ($application) {
                $decoded = json_decode($application->messages ?? '[]', true);
                return is_array($decoded) ? $decoded : [];
            })
            ->sortByDesc(fn ($message) => strtotime($message['sent_at'] ?? now()))
            ->values()
            ->all();

        return view('dashboard.student_dashboard', compact('student', 'careerApplications', 'messages'));
    }
}
