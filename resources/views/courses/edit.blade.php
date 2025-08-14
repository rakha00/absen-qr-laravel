@extends('layouts.app')

@section('content')
	<div class="max-w-2xl mx-auto px-4 sm:px-6 lg:px-8">

		<!-- Header -->
		<h1 class="text-2xl font-bold text-gray-800 mb-6">Edit Mata Kuliah</h1>

		<!-- Form -->
		<div class="bg-white shadow-sm border border-gray-200 rounded-lg p-6">
			<form action="{{ route('courses.update', $course->id) }}" method="POST" class="space-y-5">
				@csrf
				@method('PUT')

				<!-- Nama -->
				<div>
					<label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama Mata Kuliah</label>
					<input type="text" id="name" name="name" value="{{ old('name', $course->name) }}" required
						class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-800">
				</div>

				<!-- Kode -->
				<div>
					<label for="code" class="block text-sm font-medium text-gray-700 mb-1">Kode Mata Kuliah</label>
					<input type="text" id="code" name="code" value="{{ old('code', $course->code) }}" required
						class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-800">
				</div>

				<!-- Deskripsi -->
				<div>
					<label for="description" class="block text-sm font-medium text-gray-700 mb-1">Deskripsi</label>
					<textarea id="description" name="description" rows="4"
						class="w-full px-4 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 text-gray-800">{{ old('description', $course->description) }}</textarea>
				</div>

				<!-- Tombol -->
				<div class="flex items-center gap-3">
					<button type="submit"
						class="px-5 py-2 bg-blue-600 hover:bg-blue-700 text-white font-medium rounded-lg shadow-sm transition">
						Simpan Perubahan
					</button>
					<a href="{{ route('courses.index') }}"
						class="px-5 py-2 bg-gray-200 hover:bg-gray-300 text-gray-700 font-medium rounded-lg transition">
						Batal
					</a>
				</div>
			</form>
		</div>

	</div>
@endsection