@extends('layouts.app')

@section('content')
	<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

		<!-- Header -->
		<h1 class="text-2xl font-bold text-gray-800 mb-6">Detail Mata Kuliah</h1>

		<!-- Card -->
		<div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 space-y-4">
			<div>
				<h2 class="text-lg font-semibold text-gray-700">Nama Mata Kuliah</h2>
				<p class="text-gray-800">{{ $course->name }}</p>
			</div>

			<div>
				<h2 class="text-lg font-semibold text-gray-700">Kode</h2>
				<p class="text-gray-800">{{ $course->code }}</p>
			</div>

			<div>
				<h2 class="text-lg font-semibold text-gray-700">Deskripsi</h2>
				<p class="text-gray-800">{{ $course->description ?: '-' }}</p>
			</div>

			<!-- Tombol -->
			<div class="pt-4 flex gap-3">
				<a href="{{ route('courses.index') }}"
					class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition">
					Kembali
				</a>
				<a href="{{ route('courses.edit', $course->id) }}"
					class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
					Ubah
				</a>
			</div>
		</div>

		<!-- Session List -->
		<div class="bg-white border border-gray-200 rounded-lg shadow-sm p-6 mt-6">
			<h2 class="text-xl font-bold text-gray-800 mb-4">Sesi Kelas</h2>
			@if ($course->courseSessions->isEmpty())
				<p class="text-gray-600">Belum ada sesi kelas untuk mata kuliah ini.</p>
			@else
				<ul class="divide-y divide-gray-200">
					@foreach ($course->courseSessions as $session)
						<li class="py-3 flex justify-between items-center">
							<div>
								<p class="text-gray-800">{{ $session->session_name }}</p>
								<p class="text-gray-500 text-sm">{{ $session->session_date->format('Y-m-d H:i') }}</p>
							</div>
							<div class="flex gap-2">
								<a href="{{ Storage::url($session->qr_code_path) }}" target="_blank"
									class="px-3 py-1 bg-indigo-500 hover:bg-indigo-600 text-white rounded-md text-xs font-medium transition">QR</a>
								<a href="{{ route('courses.course-sessions.show', [$course->id, $session->id]) }}"
									class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-md text-xs font-medium transition">Lihat</a>
								<form action="{{ route('courses.course-sessions.destroy', [$course->id, $session->id]) }}"
									method="POST" onsubmit="return confirm('Are you sure you want to delete this session?')">
									@csrf
									@method('DELETE')
									<button type="submit"
										class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs font-medium transition">Hapus</button>
								</form>
							</div>
						</li>
					@endforeach
				</ul>
			@endif
			<div class="mt-4">
				<a href="{{ route('courses.course-sessions.create', $course->id) }}"
					class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
					+ Tambah Sesi Kelas
				</a>
			</div>
		</div>
	</div>
@endsection