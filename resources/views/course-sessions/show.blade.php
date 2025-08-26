@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">

		{{-- Header --}}
		<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
			<h1 class="text-xl sm:text-2xl font-semibold">Detail Sesi {{ $session->session_name }}</h1>
			<a href="{{ route('courses.show', $course->id) }}"
				class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md text-sm sm:text-base">
				Kembali ke Mata Kuliah
			</a>
		</div>

		{{-- Session Info --}}
		<div class="bg-white shadow rounded-lg overflow-hidden">
			<div class="px-4 py-5 border-b border-gray-200">
				<h3 class="text-lg font-medium text-gray-900">{{ $session->session_name }}</h3>
				<p class="mt-1 text-sm text-gray-500">Detail sesi mata kuliah</p>
			</div>
			<div class="divide-y divide-gray-200">
				<div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4">
					<span class="text-sm font-medium text-gray-500">Nama Mata Kuliah</span>
					<span class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $course->name }}</span>
				</div>
				<div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4">
					<span class="text-sm font-medium text-gray-500">Nama Sesi</span>
					<span class="mt-1 text-sm text-gray-900 sm:col-span-2">{{ $session->session_name }}</span>
				</div>
				<div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4">
					<span class="text-sm font-medium text-gray-500">Tanggal Sesi</span>
					<span class="mt-1 text-sm text-gray-900 sm:col-span-2">
						{{ $session->session_date ? $session->session_date->format('Y-m-d') : 'N/A' }}
					</span>
				</div>
				<div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4">
					<span class="text-sm font-medium text-gray-500">Waktu Mulai</span>
					<span class="mt-1 text-sm text-gray-900 sm:col-span-2">
						{{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }}
					</span>
				</div>
				<div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4">
					<span class="text-sm font-medium text-gray-500">Waktu Selesai</span>
					<span class="mt-1 text-sm text-gray-900 sm:col-span-2">
						{{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}
					</span>
				</div>
				<div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4">
					<span class="text-sm font-medium text-gray-500">QR Code</span>
					<div class="mt-1 sm:col-span-2">
						<img src="{{ Storage::url($session->qr_code_path) }}" alt="QR Code"
							class="w-40 h-40 mx-auto sm:mx-0">
						<p class="text-xs text-gray-500 mt-2 text-center sm:text-left">Scan QR code ini untuk mengakses
							halaman absen.</p>
					</div>
				</div>
				<div class="px-4 py-4 sm:grid sm:grid-cols-3 sm:gap-4">
					<span class="text-sm font-medium text-gray-500">Status</span>
					<span class="mt-1 sm:col-span-2">
						@if ($session->is_active)
							<span
								class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-green-100 text-green-800">Aktif</span>
						@else
							<span class="px-2 py-1 inline-flex text-xs font-semibold rounded-full bg-red-100 text-red-800">Tidak
								Aktif</span>
						@endif
					</span>
				</div>
			</div>
		</div>

		{{-- Attendance Records --}}
		<div class="mt-8">
			<h2 class="text-lg sm:text-xl font-semibold mb-4">Daftar Absen</h2>
			@if ($session->attendances->isEmpty())
				<p class="text-gray-600">Belum ada absen untuk sesi ini.</p>
			@else
				<div class="overflow-x-auto">
					<table class="min-w-full text-sm bg-white shadow rounded-lg">
						<thead class="bg-gray-100">
							<tr>
								<th class="py-3 px-4 text-left font-medium text-gray-700">Nama</th>
								<th class="py-3 px-4 text-left font-medium text-gray-700">NPM</th>
								<th class="py-3 px-4 text-left font-medium text-gray-700">Email</th>
								<th class="py-3 px-4 text-left font-medium text-gray-700">Waktu Absen</th>
								<th class="py-3 px-4 text-left font-medium text-gray-700">Status Absen</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200">
							@foreach ($session->attendances as $attendance)
								<tr>
									<td class="py-3 px-4">{{ $attendance->user->name }}</td>
									<td class="py-3 px-4">{{ $attendance->npm }}</td>
									<td class="py-3 px-4">{{ $attendance->user->email }}</td>
									<td class="py-3 px-4">{{ $attendance->attendance_time->format('Y-m-d H:i:s') }}</td>
									<td class="py-3 px-4">{{ ucfirst($attendance->status) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
		</div>

		{{-- Action Buttons --}}
		<div class="mt-6 flex flex-col sm:flex-row gap-3">
			<a href="{{ route('courses.course-sessions.edit', ['course' => $course->id, 'session' => $session->id]) }}"
				class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md text-center">
				Ubah
			</a>
			<form
				action="{{ route('courses.course-sessions.destroy', ['course' => $course->id, 'session' => $session->id]) }}"
				method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus sesi ini?');">
				@csrf
				@method('DELETE')
				<button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md w-full sm:w-auto">
					Hapus
				</button>
			</form>
		</div>
	</div>
@endsection