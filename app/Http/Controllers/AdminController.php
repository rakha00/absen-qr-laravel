<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AdminController extends Controller
{
	/**
	 * Display the admin dashboard.
	 */
	public function index()
	{
		return view('admin.dashboard');
	}

	/**
	 * Show the form for creating a new lecturer.
	 */
	public function createLecturer()
	{
		return view('admin.create-lecturer');
	}

	/**
	 * Store a newly created lecturer in storage.
	 */
	public function storeLecturer(Request $request)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);

		User::create([
			'name' => $request->name,
			'email' => $request->email,
			'password' => Hash::make($request->password),
			'role' => 'lecturer',
		]);

		return redirect()->route('admin.create-lecturer')->with('success', 'Lecturer account created successfully.');
	}

	/**
	 * Show the form for editing the specified lecturer.
	 */
	public function editLecturer(User $user)
	{
		return view('admin.edit-lecturer', compact('user'));
	}

	/**
	 * Update the specified lecturer in storage.
	 */
	public function updateLecturer(Request $request, User $user)
	{
		$request->validate([
			'name' => ['required', 'string', 'max:255'],
			'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($user->id)],
		]);

		$user->update([
			'name' => $request->name,
			'email' => $request->email,
		]);

		return redirect()->route('admin.lecturers')->with('success', 'Lecturer account updated successfully.');
	}

	/**
	 * Display a listing of lecturer accounts.
	 */
	public function lecturers()
	{
		$lecturers = User::where('role', 'lecturer')->get();
		return view('admin.lecturers', compact('lecturers'));
	}

	/**
	 * Remove the specified lecturer from storage.
	 */
	public function deleteLecturer(User $user)
	{
		$user->delete();
		return redirect()->route('admin.lecturers')->with('success', 'Lecturer account deleted successfully.');
	}
}