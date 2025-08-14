@extends('layouts.app')

@section('content')
	<div class="max-w-3xl mx-auto px-4 py-8">
		<!-- Header -->
		<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-6">
			<h1 class="text-2xl font-bold text-gray-800">
				Edit Session - {{ $course->name }}
			</h1>
			<a href="{{ route('courses.show', $course->id) }}"
				class="inline-block bg-gray-500 hover:bg-gray-600 text-white text-sm font-medium px-4 py-2 rounded-md">
				← Back to Course Details
			</a>
		</div>

		<!-- Error Messages -->
		@if ($errors->any())
			<div class="bg-red-50 border-l-4 border-red-500 p-4 rounded-md mb-6">
				<div class="text-red-800 font-semibold mb-2">Please fix the following errors:</div>
				<ul class="list-disc list-inside text-red-700 text-sm">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<!-- Edit Form -->
		<div class="bg-white rounded-lg shadow p-6">
			<form action="{{ route('courses.course-sessions.update', [$course->id, $session->id]) }}" method="POST"
				class="space-y-5">
				@csrf
				@method('PUT')

				<!-- Session Name -->
				<div>
					<label for="session_name" class="block text-sm font-medium text-gray-700">Session Name</label>
					<input type="text" name="session_name" id="session_name"
						value="{{ old('session_name', $session->session_name) }}" required
						class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
				</div>

				<!-- Session Date -->
				<div>
					<label for="session_date" class="block text-sm font-medium text-gray-700">Session Date</label>
					<input type="date" name="session_date" id="session_date"
						value="{{ old('session_date', optional($session->session_date)->format('Y-m-d')) }}" required
						class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
				</div>

				<!-- Start Time -->
				<div>
					<label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
					<input type="time" name="start_time" id="start_time"
						value="{{ old('start_time', optional($session->start_time)->format('H:i')) }}" required
						class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
				</div>

				<!-- End Time -->
				<div>
					<label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
					<input type="time" name="end_time" id="end_time"
						value="{{ old('end_time', optional($session->end_time)->format('H:i')) }}" required
						class="mt-1 block w-full p-2 rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring focus:ring-blue-200">
				</div>

				<!-- Status -->
				<div class="flex items-center">
					<input type="hidden" name="is_active" value="0"> {{-- Hidden field for unchecked checkbox --}}
					<input type="checkbox" name="is_active" id="is_active" value="1" {{-- Explicit value for checked
						checkbox --}} class="h-4 w-4 text-blue-600 border-gray-300 rounded focus:ring-blue-500"
						@checked(old('is_active', $session->is_active))>
					<label for="is_active" class="ml-2 block text-sm text-gray-700">Active</label>
				</div>

				<!-- Submit -->
				<div class="pt-4">
					<button type="submit"
						class="w-full sm:w-auto bg-blue-600 hover:bg-blue-700 text-white font-medium px-5 py-2 rounded-md">
						Update Session
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection