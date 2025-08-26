<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;

class ProfileController extends Controller
{
	/**
	 * Show the form for editing the user's profile.
	 */
	public function edit()
	{
		return view('profile.edit');
	}

	/**
	 * Update the user's profile information.
	 */
	public function update(Request $request)
	{
		$user = auth()->user();

		$request->validate([
			'name' => 'required|string|max:255',
			'email' => 'required|string|email|max:255|unique:users,email,' . $user->id,
		]);

		$user->name = $request->name;
		$user->email = $request->email;
		$user->save();

		return redirect()->route('profile.edit')->with('success', 'Profile updated successfully.');
	}

	/**
	 * Update the user's password.
	 */
	public function updatePassword(Request $request)
	{
		$request->validate([
			'current_password' => ['required', 'string'],
			'password' => ['required', 'string', 'min:8', 'confirmed'],
		]);

		$user = auth()->user();

		if (!Hash::check($request->current_password, $user->password)) {
			throw ValidationException::withMessages([
				'current_password' => ['The provided password does not match your current password.'],
			]);
		}

		$user->password = Hash::make($request->password);
		$user->save();

		return redirect()->route('profile.edit')->with('success', 'Password updated successfully.');
	}
}