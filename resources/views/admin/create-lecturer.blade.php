@extends('layouts.app')

@section('content')
	<div class="max-w-4xl mx-auto px-4 py-8">
		<h1 class="text-3xl font-bold text-gray-800 mb-6">Buat Akun Dosen</h1>

		@if (session('success'))
			<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
				<strong class="font-bold">Berhasil!</strong>
				<span class="block sm:inline">{{ session('success') }}</span>
			</div>
		@endif

		<div class="bg-white shadow-md rounded-lg p-6">
			<form method="POST" action="{{ route('admin.store-lecturer') }}">
				@csrf

				<div class="mb-4">
					<label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
					<input type="text"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
						id="name" name="name" value="{{ old('name') }}" required autofocus>
					@error('name')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-4">
					<label for="email" class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
					<input type="email"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
						id="email" name="email" value="{{ old('email') }}" required>
					@error('email')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-4">
					<label for="password" class="block text-gray-700 text-sm font-bold mb-2">Kata Sandi</label>
					<input type="password"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('password') border-red-500 @enderror"
						id="password" name="password" required>
					@error('password')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-6">
					<label for="password_confirmation" class="block text-gray-700 text-sm font-bold mb-2">Konfirmasi
						Kata Sandi</label>
					<input type="password"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
						id="password_confirmation" name="password_confirmation" required>
				</div>

				<div class="flex items-center justify-between">
					<button type="submit"
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
						Buat Akun Dosen
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection