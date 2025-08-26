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
        } elseif ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect('/'); // Fallback for undefined roles
    }
}
