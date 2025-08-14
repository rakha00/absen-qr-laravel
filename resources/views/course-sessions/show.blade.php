@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<div class="flex justify-between items-center mb-4">
			<h1 class="text-2xl font-semibold">Session Details for {{ $course->name }}</h1>
			<a href="{{ route('courses.course-sessions.index', $course->id) }}"
				class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Back to Sessions</a>
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
							{{ $session->session_date->format('Y-m-d H:i') }}
						</dd>
					</div>
				</dl>
			</div>
		</div>

		<div class="mt-6 flex">
			<a href="{{ route('courses.course-sessions.edit', [$course->id, $session->id]) }}"
				class="bg-indigo-500 hover:bg-indigo-600 text-white px-4 py-2 rounded-md mr-2">Edit</a>
			<form action="{{ route('courses.course-sessions.destroy', [$course->id, $session->id]) }}" method="POST"
				onsubmit="return confirm('Are you sure you want to delete this session?');">
				@csrf
				@method('DELETE')
				<button type="submit" class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-md">Delete</button>
			</form>
		</div>
	</div>
@endsection