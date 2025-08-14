@extends('layouts.guest')

@section('content')
	<div class="w-full max-w-md bg-white rounded-2xl shadow-lg p-8 my-12">
		<!-- Logo & Title -->
		<div class="flex flex-col items-center mb-6">
			<svg class="h-16 w-16 text-blue-600 mb-4" fill="currentColor" viewBox="0 0 24 24">
				<path
					d="M3 3h4v4H3V3zm7 0h4v4h-4V3zm7 0h4v4h-4V3zM3 10h4v4H3v-4zm7 0h4v4h-4v-4zm7 0h4v4h-4v-4zM3 17h4v4H3v-4zm7 0h4v4h-4v-4zm7 0h4v4h-4v-4z" />
			</svg>
			<h2 class="text-2xl sm:text-3xl font-bold text-gray-800 text-center">Daftar Akun AbsenQR</h2>
			<p class="text-gray-500 text-sm mt-1 text-center">Buat akun untuk mulai absensi</p>
		</div>

		<!-- Error Alerts -->
		@if ($errors->any())
			<div class="bg-red-50 border border-red-300 text-red-600 px-4 py-3 rounded-lg mb-4 text-sm">
				<ul class="list-disc list-inside">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<!-- Register Form -->
		<form action="{{ route('register') }}" method="POST" class="space-y-5">
			@csrf
			<div>
				<label for="name" class="block text-gray-700 font-medium mb-1">Nama</label>
				<input type="text" name="name" id="name" value="{{ old('name') }}"
					class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
					placeholder="Nama lengkap" required autofocus>
			</div>
			<div>
				<label for="email" class="block text-gray-700 font-medium mb-1">Email</label>
				<input type="email" name="email" id="email" value="{{ old('email') }}"
					class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
					placeholder="you@example.com" required>
			</div>
			<div>
				<label for="nip" class="block text-gray-700 font-medium mb-1">NIP</label>
				<input type="text" name="nip" id="nip" value="{{ old('nip') }}"
					class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
					placeholder="Nomor Induk Pegawai" required>
			</div>
			<div>
				<label for="password" class="block text-gray-700 font-medium mb-1">Password</label>
				<input type="password" name="password" id="password"
					class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
					placeholder="••••••••" required>
			</div>
			<div>
				<label for="password_confirmation" class="block text-gray-700 font-medium mb-1">
					Konfirmasi Password
				</label>
				<input type="password" name="password_confirmation" id="password_confirmation"
					class="w-full border border-gray-300 rounded-lg px-4 py-2 focus:outline-none focus:ring-2 focus:ring-blue-500"
					placeholder="Ulangi password" required>
			</div>

			<!-- Submit Button -->
			<button type="submit"
				class="w-full bg-blue-600 hover:bg-blue-700 text-white font-semibold py-2 px-4 rounded-lg shadow-md transition">
				Daftar
			</button>

			<!-- Login Link -->
			<p class="text-center text-sm text-gray-600">
				Sudah punya akun?
				<a href="{{ route('login') }}" class="text-blue-600 hover:underline">Masuk</a>
			</p>
		</form>
	</div>
@endsection