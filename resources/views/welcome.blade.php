@extends('layouts.guest')

@section('content')
	<div class="flex flex-col items-center justify-center min-h-screen">
		<div class="text-center">
			{{-- Application Logo Placeholder --}}
			<svg class="mx-auto h-32 w-auto text-blue-500" fill="currentColor" viewBox="0 0 24 24"
				xmlns="http://www.w3.org/2000/svg">
				<path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5-10-5-10 5z" />
			</svg>

			<h1 class="text-4xl font-bold text-gray-800 dark:text-white mb-2">Absen QR</h1>
			<p class="text-lg text-gray-600 dark:text-gray-400 mb-8">Sistem Absensi Berbasis QR Code</p>

			<div class="space-x-4">
				<a href="{{ route('login') }}"
					class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">
					Login
				</a>
				<a href="{{ route('register') }}"
					class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-6 rounded-lg shadow-md transition duration-300 ease-in-out">
					Register
				</a>
			</div>
		</div>
	</div>
@endsection