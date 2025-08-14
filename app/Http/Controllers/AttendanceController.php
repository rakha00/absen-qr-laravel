<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use App\Models\CourseSession;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AttendanceController extends Controller
{
    public function show($uuid)
    {
        $session = CourseSession::where('qr_code_data', $uuid)->firstOrFail();

        // Check if the session is active
        if (! $session->is_active) {
            return redirect('/')->with('error', 'This attendance session is not active.');
        }

        // Check if current time is within session start and end times
        $currentTime = now();
        $startTime = \Carbon\Carbon::parse($session->session_date->format('Y-m-d').' '.$session->start_time);
        $endTime = \Carbon\Carbon::parse($session->session_date->format('Y-m-d').' '.$session->end_time);

        if ($currentTime->lt($startTime) || $currentTime->gt($endTime)) {
            return redirect('/')->with('error', 'This attendance session is not currently open.');
        }

        return view('attendance.form', compact('session', 'uuid'));
    }

    public function store(Request $request, $uuid)
    {
        $session = CourseSession::where('qr_code_data', $uuid)->firstOrFail();

        // Check if the session is active
        if (! $session->is_active) {
            return back()->with('error', 'This attendance session is not active.')->withInput();
        }

        // Check if current time is within session start and end times
        $currentTime = now();
        $startTime = \Carbon\Carbon::parse($session->session_date->format('Y-m-d').' '.$session->start_time);
        $endTime = \Carbon\Carbon::parse($session->session_date->format('Y-m-d').' '.$session->end_time);

        if ($currentTime->lt($startTime) || $currentTime->gt($endTime)) {
            return back()->with('error', 'This attendance session is not currently open.')->withInput();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $student = Student::firstOrCreate(
            ['email' => $request->email],
            ['name' => $request->name]
        );

        // Check if student already attended this session
        $existingAttendance = Attendance::where('session_id', $session->id)
            ->where('student_id', $student->id)
            ->first();

        if ($existingAttendance) {
            return back()->with('error', 'You have already submitted attendance for this session.')->withInput();
        }

        Attendance::create([
            'session_id' => $session->id,
            'student_id' => $student->id,
            'attendance_time' => now(),
            'status' => 'present', // You might want to make this dynamic later
        ]);

        return redirect()->route('attendance.success')->with('success', 'Attendance submitted successfully!');
    }

    public function success()
    {
        return view('attendance.success');
    }
}
