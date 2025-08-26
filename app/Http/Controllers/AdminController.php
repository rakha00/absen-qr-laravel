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
}