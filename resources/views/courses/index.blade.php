@extends('layouts.app')

@section('content')
	<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">

		<!-- Header -->
		<div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-3">
			<h1 class="text-2xl font-bold text-gray-800">Daftar Mata Kuliah</h1>
			<a href="{{ route('courses.create') }}"
				class="inline-flex items-center px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white text-sm font-medium rounded-lg shadow-sm transition">
				+ Tambah Mata Kuliah
			</a>
		</div>

		<!-- Table Container -->
		<div class="bg-white shadow-sm border border-gray-200 rounded-lg overflow-hidden">
			<div class="overflow-x-auto">
				<table class="min-w-full divide-y divide-gray-200 text-sm">
					<thead class="bg-gray-50">
						<tr>
							<th class="px-4 py-3 text-left font-semibold text-gray-600">ID</th>
							<th class="px-4 py-3 text-left font-semibold text-gray-600">Nama</th>
							<th class="px-4 py-3 text-left font-semibold text-gray-600">Kode</th>
							<th class="px-4 py-3 text-left font-semibold text-gray-600">Deskripsi</th>
							<th class="px-4 py-3 text-center font-semibold text-gray-600">Aksi</th>
						</tr>
					</thead>
					<tbody class="divide-y divide-gray-100">
						@forelse ($courses as $course)
							<tr class="hover:bg-gray-50">
								<td class="px-4 py-3 text-gray-700">{{ $course->id }}</td>
								<td class="px-4 py-3 text-gray-700">{{ $course->name }}</td>
								<td class="px-4 py-3 text-gray-700">{{ $course->code }}</td>
								<td class="px-4 py-3 text-gray-600">{{ $course->description }}</td>
								<td class="px-4 py-3 text-center">
									<div class="flex justify-center gap-2 flex-wrap">
										<a href="{{ route('courses.show', $course->id) }}"
											class="px-3 py-1 bg-green-500 hover:bg-green-600 text-white rounded-md text-xs font-medium transition">
											Lihat
										</a>
										<a href="{{ route('courses.edit', $course->id) }}"
											class="px-3 py-1 bg-yellow-500 hover:bg-yellow-600 text-white rounded-md text-xs font-medium transition">
											Edit
										</a>
										<form action="{{ route('courses.destroy', $course->id) }}" method="POST"
											onsubmit="return confirm('Yakin hapus?')">
											@csrf
											@method('DELETE')
											<button type="submit"
												class="px-3 py-1 bg-red-500 hover:bg-red-600 text-white rounded-md text-xs font-medium transition">
												Hapus
											</button>
										</form>
									</div>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="5" class="px-4 py-6 text-center text-gray-500">Tidak ada data mata kuliah</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>

	</div>
@endsection