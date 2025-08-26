@extends('layouts.app')

@section('content')
	<div class="max-w-6xl mx-auto px-4 py-8">
		<h1 class="text-3xl font-bold text-gray-800 mb-6">Daftar Akun Dosen</h1>

		<div class="bg-white shadow-md rounded-lg p-6">
			<div class="overflow-x-auto">
				<table class="min-w-full bg-white">
					<thead>
						<tr>
							<th
								class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Nama
							</th>
							<th
								class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Email
							</th>
							<th
								class="py-2 px-4 border-b border-gray-200 bg-gray-50 text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
								Aksi
							</th>
						</tr>
					</thead>
					<tbody>
						@forelse ($lecturers as $lecturer)
							<tr>
								<td class="py-2 px-4 border-b border-gray-200">{{ $lecturer->name }}</td>
								<td class="py-2 px-4 border-b border-gray-200">{{ $lecturer->email }}</td>
								<td class="py-2 px-4 border-b border-gray-200">
									<!-- Add actions here like edit/delete -->
									<a href="{{ route('admin.lecturers.edit', $lecturer->id) }}"
										class="text-blue-600 hover:text-blue-900">Edit</a>
									<span class="text-gray-400">|</span>
									<form action="{{ route('admin.lecturers.delete', $lecturer->id) }}" method="POST"
										class="inline-block"
										onsubmit="return confirm('Are you sure you want to delete this lecturer account?');">
										@csrf
										@method('DELETE')
										<button type="submit" class="text-red-600 hover:text-red-900">Hapus</button>
									</form>
								</td>
							</tr>
						@empty
							<tr>
								<td colspan="3" class="py-4 text-center text-gray-500">Tidak ada akun dosen ditemukan.</td>
							</tr>
						@endforelse
					</tbody>
				</table>
			</div>
		</div>
	</div>
@endsection