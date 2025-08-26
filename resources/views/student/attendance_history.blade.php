@extends('layouts.app')

@section('content')
	<div class="max-w-6xl mx-auto px-4 py-8">
		<h1 class="text-3xl font-bold text-gray-800 mb-6">Riwayat Absensi Saya</h1>

		@if ($attendances->isEmpty())
			<p class="text-gray-600">Anda belum memiliki riwayat absensi.</p>
		@else
			<div class="bg-white shadow-md rounded-lg overflow-hidden">
				<table class="min-w-full divide-y divide-gray-200">
					<thead class="bg-gray-50">
						<tr>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Mata Kuliah</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Sesi</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								NPM</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Waktu Absen</th>
							<th scope="col"
								class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
								Status</th>
						</tr>
					</thead>
					<tbody class="bg-white divide-y divide-gray-200">
						@foreach ($attendances as $attendance)
							<tr>
								<td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">
									{{ $attendance->session->course->name }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
									{{ $attendance->session->session_name }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
									{{ $attendance->npm }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
									{{ $attendance->attendance_time->format('d M Y, H:i:s') }}
								</td>
								<td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
									{{ ucfirst($attendance->status) }}
								</td>
							</tr>
						@endforeach
					</tbody>
				</table>
			</div>
		@endif
	</div>
@endsection