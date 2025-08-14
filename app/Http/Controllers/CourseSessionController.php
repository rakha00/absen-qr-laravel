<?php

namespace App\Http\Controllers;

use App\Models\Course;
use App\Models\CourseSession;
use Illuminate\Http\Request;

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
        ]);

        $course->courseSessions()->create($validated);

        return redirect()->route('courses.course-sessions.index', $course->id)
            ->with('success', 'Course session created successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Course $course, CourseSession $session)
    {
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
        ]);

        $session->update($validated);

        return redirect()->route('courses.course-sessions.index', $course->id)
            ->with('success', 'Course session updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Course $course, CourseSession $session)
    {
        $session->delete();

        return redirect()->route('courses.course-sessions.index', $course->id)
            ->with('success', 'Course session deleted successfully.');
    }
}
