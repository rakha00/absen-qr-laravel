<?php

namespace App\Http\Controllers\LecturerAuth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class LoginController extends Controller
{
	public function showLoginForm()
	{
		return view('auth.lecturer-login');
	}

	public function login(Request $request)
	{
		$credentials = $request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);

		if (Auth::guard('lecturer')->attempt($credentials, $request->remember)) {
			$request->session()->regenerate();

			return redirect()->intended('/lecturer/dashboard');
		}

		throw ValidationException::withMessages([
			'email' => [trans('auth.failed')],
		]);
	}

	public function logout(Request $request)
	{
		Auth::guard('lecturer')->logout();

		$request->session()->invalidate();

		$request->session()->regenerateToken();

		return redirect('/');
	}
}