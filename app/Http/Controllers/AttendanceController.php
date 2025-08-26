<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\CourseSession;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function show($uuid)
    {
        // Ensure the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to submit attendance.');
        }

        $session = CourseSession::where('qr_code_data', $uuid)->firstOrFail();

        // Check if the session is active
        if (!$session->is_active) {
            return redirect('/')->with('error', 'This attendance session is not active.');
        }

        // Check if current time is within session start and end times
        $currentTime = now();
        $startTime = $session->session_date->setTimeFrom($session->start_time);
        $endTime = $session->session_date->setTimeFrom($session->end_time);

        if ($currentTime->lt($startTime) || $currentTime->gt($endTime)) {
            return view('attendance.form', compact('session', 'uuid'))->with('error', 'This attendance session is not currently open.');
        }

        return view('attendance.form', compact('session', 'uuid'));
    }

    public function store(Request $request, $uuid)
    {
        $session = CourseSession::where('qr_code_data', $uuid)->firstOrFail();

        // Check if the session is active
        if (!$session->is_active) {
            return back()->with('error', 'This attendance session is not active.')->withInput();
        }

        // Check if current time is within session start and end times
        $currentTime = now();
        $startTime = $session->session_date->setTimeFrom($session->start_time);
        $endTime = $session->session_date->setTimeFrom($session->end_time);


        if ($currentTime->lt($startTime) || $currentTime->gt($endTime)) {
            return back()->with('error', 'This attendance session is not currently open.')->withInput();
        }

        // Ensure the user is authenticated
        if (!auth()->check()) {
            return redirect()->route('login')->with('error', 'Please login to submit attendance.');
        }

        $user = auth()->user();

        $validated = $request->validate([
            'npm' => 'required|string|max:255', // Add validation for NPM
        ]);

        // Check if user has the 'student' role
        if ($user->role !== 'student') {
            return back()->with('error', 'Only students can submit attendance.')->withInput();
        }

        // Check if student already attended this session
        $existingAttendance = Attendance::where('session_id', $session->id)
            ->where('user_id', $user->id)
            ->first();

        if ($existingAttendance) {
            return back()->with('error', 'You have already submitted attendance for this session.')->withInput();
        }

        Attendance::create([
            'session_id' => $session->id,
            'user_id' => $user->id,
            'npm' => $validated['npm'], // Save NPM from the form
            'attendance_time' => now(),
            'status' => 'hadir', // You might want to make this dynamic later
        ]);

        return redirect()->route('attendance.success')->with('success', 'Attendance submitted successfully!');
    }

    public function history()
    {
        $user = auth()->user();
        $attendances = $user->attendances()->with('session.course')->orderBy('attendance_time', 'desc')->get();

        return view('student.attendance_history', compact('attendances'));
    }

    public function success()
    {
        return view('attendance.success');
    }
}
