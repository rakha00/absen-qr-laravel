@extends('layouts.app')

@section('content')
	<div class="max-w-4xl mx-auto px-4 py-8">
		<h1 class="text-3xl font-bold text-gray-800 mb-6">Profile Settings</h1>

		@if (session('success'))
			<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
				<strong class="font-bold">Success!</strong>
				<span class="block sm:inline">{{ session('success') }}</span>
			</div>
		@endif

		<div class="bg-white shadow-md rounded-lg p-6 mb-8">
			<h2 class="text-xl font-semibold text-gray-700 mb-4">Update Profile Information</h2>
			<form method="POST" action="{{ route('profile.update') }}">
				@csrf
				@method('PUT')

				<div class="mb-4">
					<label for="name" class="block text-gray-700 text-sm font-bold mb-2">Name</label>
					<input type="text"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
						id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
					@error('name')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-4">
					<label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email address</label>
					<input type="email"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
						id="email" name="email" value="{{ old('email', auth()->user()->email) }}" required>
					@error('email')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="flex items-center justify-between">
					<button type="submit"
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
						Update Profile
					</button>
				</div>
			</form>
		</div>

		<div class="bg-white shadow-md rounded-lg p-6">
			<h2 class="text-xl font-semibold text-gray-700 mb-4">Update Password</h2>
			<form method="POST" action="{{ route('profile.password.update') }}">
				@csrf
				@method('PUT')

				<div class="mb-4">
					<label for="current_password" class="block text-gray-700 text-sm font-bold mb-2">Current
						Password</label>
					<input type="password"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('current_password') border-red-500 @enderror"
						id="current_password" name="current_password" required>
					@error('current_password')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-4">
					<label for="password" class="block text-gray-700 text-sm font-bold mb-2">New Password</label>
					<input type="password"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
						id="password" name="password" required>
					@error('password')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-6">
					<label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Confirm New
						Password</label>
					<input type="password"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						id="password_confirmation" name="password_confirmation" required>
				</div>

				<div class="flex items-center justify-between">
					<button type="submit"
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
						Update Password
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection