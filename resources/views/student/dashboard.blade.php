@extends('layouts.app')

@section('content')
	<!-- Header -->
	<div class="max-w-6xl mx-auto mb-8">
		<h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 flex items-center gap-3">
			Dashboard Mahasiswa
		</h1>
		<p class="text-gray-600 mt-1">Selamat datang, {{ Auth::user()->name }}!</p>
	</div>

	<!-- Cards -->
	<div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
		<!-- My Attendance -->
		<a href="{{ route('attendance.history') }}"
			class="bg-white border border-gray-200 rounded-xl shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition transform">
			<div class="flex items-center mb-4">
				<span class="bg-blue-100 text-blue-600 p-3 rounded-lg">
					<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
						<path d="M3 5h18v2H3V5zm0 6h12v2H3v-2zm0 6h18v2H3v-2z" />
					</svg>
				</span>
				<h2 class="text-lg sm:text-xl font-semibold text-gray-800 ml-3">Absensi Saya</h2>
			</div>
			<p class="text-gray-600 text-sm sm:text-base">Lihat riwayat absensi Anda.</p>
		</a>
	</div>
@endsection