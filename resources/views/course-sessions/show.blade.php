@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<div class="flex justify-between items-center mb-4">
			<h1 class="text-2xl font-semibold">Session Details for {{ $course->name }}</h1>
			<a href="{{ route('courses.show', $course->id) }}"
				class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Back to Course Details</a>
		</div>

		<div class="bg-white shadow overflow-hidden sm:rounded-lg">
			<div class="px-4 py-5 sm:px-6">
				<h3 class="text-lg leading-6 font-medium text-gray-900">
					{{ $session->session_name }}
				</h3>
				<p class="mt-1 max-w-2xl text-sm text-gray-500">
					Details about the course session.
				</p>
			</div>
			<div class="border-t border-gray-200">
				<dl>
					<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Course Name
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ $course->name }}
						</dd>
					</div>
					<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Session Name
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ $session->session_name }}
						</dd>
					</div>
					<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Session Date
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ $session->session_date ? $session->session_date->format('Y-m-d') : 'N/A' }}
						</dd>
					</div>
					<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Start Time
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ \Carbon\Carbon::parse($session->start_time)->format('H:i') }}
						</dd>
					</div>
					<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							End Time
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							{{ \Carbon\Carbon::parse($session->end_time)->format('H:i') }}
						</dd>
					</div>
					<div class="bg-white px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							QR Code
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							<img src="{{ asset($session->qr_code_path) }}" alt="QR Code" class="w-48 h-48">
							<p class="text-xs text-gray-500 mt-2">Scan this QR code to access the attendance page.</p>
						</dd>
					</div>
					<div class="bg-gray-50 px-4 py-5 sm:grid sm:grid-cols-3 sm:gap-4 sm:px-6">
						<dt class="text-sm font-medium text-gray-500">
							Status
						</dt>
						<dd class="mt-1 text-sm text-gray-900 sm:mt-0 sm:col-span-2">
							@if ($session->is_active)
								<span
									class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">Active</span>
							@else
								<span
									class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">Inactive</span>
							@endif
						</dd>
					</div>
				</dl>
			</div>
		</div>

		<div class="mt-6">
			<h2 class="text-xl font-semibold mb-4">Attendance Records</h2>
			@if ($session->attendances->isEmpty())
				<p class="text-gray-600">No attendance records for this session yet.</p>
			@else
				<div class="overflow-x-auto">
					<table class="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
						<thead class="bg-gray-200">
							<tr>
								<th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Name</th>
								<th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Email</th>
								<th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Attendance Time</th>
								<th class="py-3 px-4 text-left text-sm font-medium text-gray-700">Status</th>
							</tr>
						</thead>
						<tbody class="divide-y divide-gray-200">
							@foreach ($session->attendances as $attendance)
								<tr>
									<td class="py-3 px-4 text-sm text-gray-900">{{ $attendance->student->name }}</td>
									<td class="py-3 px-4 text-sm text-gray-900">{{ $attendance->student->email }}</td>
									<td class="py-3 px-4 text-sm text-gray-900">
										{{ $attendance->attendance_time->format('Y-m-d H:i:s') }}
									</td>
									<td class="py-3 px-4 text-sm text-gray-900">{{ ucfirst($attendance->status) }}</td>
								</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			@endif
		</div>

		<div class="mt-6 flex">
			<a href="{{ route('courses.course-sessions.edit', ['course' => $course->id, 'session' => $session->id]) }}"
				class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md mr-2">Edit</a>
			<form
				action="{{ route('courses.course-sessions.destroy', ['course' => $course->id, 'session' => $session->id]) }}"
				method="POST" onsubmit="return confirm('Are you sure you want to delete this session?');">
				@csrf
				@method('DELETE')
				<button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
			</form>
		</div>
	</div>
@endsection