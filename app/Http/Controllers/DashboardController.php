<?php

namespace App\Http\Controllers;

class DashboardController extends Controller
{
    public function lecturerDashboard()
    {
        return view('lecturer.dashboard');
    }

    public function studentDashboard()
    {
        return view('student.dashboard');
    }
}
