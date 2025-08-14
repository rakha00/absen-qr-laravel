@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<div class="flex justify-between items-center mb-4">
			<h1 class="text-2xl font-semibold">Edit Session for {{ $course->name }}</h1>
			<a href="{{ route('courses.course-sessions.index', $course->id) }}"
				class="bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-md">Back to Sessions</a>
		</div>

		@if ($errors->any())
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
				<strong class="font-bold">Whoops!</strong> There were some problems with your input.
				<ul class="mt-3 list-disc list-inside">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<div class="bg-white shadow overflow-hidden sm:rounded-lg p-6">
			<form action="{{ route('courses.course-sessions.update', [$course->id, $session->id]) }}" method="POST">
				@csrf
				@method('PUT')
				<div class="mb-4">
					<label for="session_name" class="block text-sm font-medium text-gray-700">Session Name</label>
					<input type="text" name="session_name" id="session_name"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
						value="{{ old('session_name', $session->session_name) }}" required>
				</div>
				<div class="mb-4">
					<label for="session_date" class="block text-sm font-medium text-gray-700">Session Date</label>
					<input type="date" name="session_date" id="session_date"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
						value="{{ old('session_date', $session->session_date->format('Y-m-d')) }}" required>
				</div>
				<div class="mb-4">
					<label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
					<input type="time" name="start_time" id="start_time"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
						value="{{ old('start_time', $session->start_time->format('H:i')) }}" required>
				</div>
				<div class="mb-4">
					<label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
					<input type="time" name="end_time" id="end_time"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
						value="{{ old('end_time', $session->end_time->format('H:i')) }}" required>
				</div>
				<div class="mb-4">
					<label for="is_active" class="block text-sm font-medium text-gray-700">Session Status</label>
					<input type="checkbox" name="is_active" id="is_active"
						class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
						@checked(old('is_active', $session->is_active))>
					<span class="ml-2 text-sm text-gray-700">Active</span>
				</div>
				<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Update
					Session</button>
			</form>
		</div>
	</div>
@endsection