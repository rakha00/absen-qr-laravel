<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSession;
use Endroid\QrCode\Builder\Builder;
use Endroid\QrCode\Encoding\Encoding;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\RoundBlockSizeMode;
use Endroid\QrCode\Writer\PngWriter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CourseSessionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Course $course)
    {
        $course->load('courseSessions'); // Eager load the courseSessions relationship

        return view('course-sessions.index', compact('course'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Course $course)
    {
        return view('course-sessions.create', compact('course'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Course $course)
    {
        $validated = $request->validate([
            'session_name' => 'required|string|max:255',
            'session_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
        ]);

        $sessionUuid = Str::uuid();
        $attendanceUrl = route('attendance.show', ['uuid' => $sessionUuid]);

        $qrCodeBuilder = new Builder(
            data: $attendanceUrl,
            writer: new PngWriter,
            encoding: new Encoding('UTF-8'),
            errorCorrectionLevel: ErrorCorrectionLevel::High,
            size: 300,
            margin: 10,
            roundBlockSizeMode: RoundBlockSizeMode::Margin,
        );

        $qrCodeResult = $qrCodeBuilder->build();

        $qrCodePath = 'qrcodes/' . $sessionUuid . '.png';
        // Save the QR code to the 'public' disk in storage
        // This will save to storage/app/public/qrcodes/
        Storage::disk('public')->put($qrCodePath, $qrCodeResult->getString());

        $session = $course->courseSessions()->create([
            'session_name' => $validated['session_name'],
            'session_date' => $validated['session_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'qr_code_data' => $sessionUuid, // Store the UUID, not the full URL or path
            'qr_code_path' => $qrCodePath, // Store the public path to the QR code image
        ]);

        return redirect()->route('courses.course-sessions.show', ['course' => $course->id, 'session' => $session->id])
            ->with('success', 'Course session created successfully. QR code generated.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, CourseSession $session)
    {
        $session->load('attendances.user'); // Eager load attendances and their associated users

        return view('course-sessions.show', compact('course', 'session'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Course $course, CourseSession $session)
    {
        return view('course-sessions.edit', compact('course', 'session'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Course $course, CourseSession $session)
    {
        $validated = $request->validate([
            'session_name' => 'required|string|max:255',
            'session_date' => 'required|date',
            'start_time' => 'required|date_format:H:i',
            'end_time' => 'required|date_format:H:i|after:start_time',
            'is_active' => 'nullable|boolean',
        ]);

        $session->update([
            'session_name' => $validated['session_name'],
            'session_date' => $validated['session_date'],
            'start_time' => $validated['start_time'],
            'end_time' => $validated['end_time'],
            'is_active' => $request->boolean('is_active'),
        ]);

        return redirect()->route('courses.show', $course->id)
            ->with('success', 'Course session updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, $sessionId)
    {
        $session = CourseSession::findOrFail($sessionId);

        // Delete associated attendance records first
        $session->attendances()->delete();

        $session->delete();

        return redirect()->route('courses.show', $course->id)
            ->with('success', 'Course session deleted successfully.');
    }
}
