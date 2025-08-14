@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<div class="flex justify-between items-center mb-4">
			<h1 class="text-2xl font-semibold">Course Sessions for {{ $course->name }}</h1>
			<a href="{{ route('courses.course-sessions.create', $course->id) }}"
				class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Create New Session</a>
		</div>

		@if (session('success'))
			<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
				<span class="block sm:inline">{{ session('success') }}</span>
			</div>
		@endif

		<div class="bg-white shadow overflow-hidden sm:rounded-lg">
			<table class="min-w-full divide-y divide-gray-200">
				<thead class="bg-gray-50">
					<tr>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Session Name
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Session Date
						</th>
						<th scope="col"
							class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
							Actions
						</th>
					</tr>
				</thead>
				<tbody class="bg-white divide-y divide-gray-200">
					@forelse ($course->courseSessions as $session)
						<tr>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm font-medium text-gray-900">{{ $session->session_name }}</div>
							</td>
							<td class="px-6 py-4 whitespace-nowrap">
								<div class="text-sm text-gray-900">{{ $session->session_date->format('Y-m-d H:i') }}</div>
							</td>
							<td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
								<a href="{{ route('courses.course-sessions.show', ['course' => $course->id, 'course_session' => $session->id]) }}"
									class="text-blue-600 hover:text-blue-900 mr-2">View</a>
								<a href="{{ route('courses.course-sessions.edit', ['course' => $course->id, 'course_session' => $session->id]) }}"
									class="text-indigo-600 hover:text-indigo-900 mr-2">Edit</a>
								<form
									action="{{ route('courses.course-sessions.destroy', ['course' => $course->id, 'course_session' => $session->id]) }}"
									method="POST" class="inline">
									@csrf
									@method('DELETE')
									<button type="submit" class="text-red-600 hover:text-red-900"
										onclick="return confirm('Are you sure you want to delete this session?')">Delete</button>
								</form>
							</td>
						</tr>
					@empty
						<tr>
							<td colspan="3" class="px-6 py-4 whitespace-nowrap text-sm text-gray-500 text-center">No sessions
								found for this course.</td>
						</tr>
					@endforelse
				</tbody>
			</table>
		</div>
	</div>
@endsection