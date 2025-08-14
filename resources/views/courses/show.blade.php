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
					Edit
				</a>
			</div>
		</div>

	</div>
@endsection