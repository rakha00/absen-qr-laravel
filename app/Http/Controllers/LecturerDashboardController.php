<?php

namespace App\Http\Controllers;

class LecturerDashboardController extends Controller
{
    public function index()
    {
        return view('lecturer.dashboard');
    }
}
