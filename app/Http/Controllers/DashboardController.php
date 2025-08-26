<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function index()
    {
        $user = auth()->user();

        if ($user->role === 'lecturer') {
            return view('lecturer.dashboard');
        } elseif ($user->role === 'student') {
            return view('student.dashboard');
        }

        return redirect('/'); // Or a default dashboard for other roles
    }
}
