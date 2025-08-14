@extends('layouts.app')

@section('content')
	<div class="max-w-3xl mx-auto px-4 py-8">
		<!-- Header -->
		<div class="flex flex-col sm:flex-row sm:items-center sm:justify-between mb-6 gap-3">
			<h1 class="text-xl sm:text-2xl font-bold text-gray-800">
				Create New Session <span class="text-blue-600">({{ $course->name }})</span>
			</h1>
			<a href="{{ route('courses.show', $course->id) }}"
				class="inline-block bg-gray-500 hover:bg-gray-600 text-white px-4 py-2 rounded-lg text-sm font-medium text-center transition">
				← Back to Course Details
			</a>
		</div>

		<!-- Error Messages -->
		@if ($errors->any())
			<div class="bg-red-50 border border-red-200 text-red-700 p-4 rounded-lg mb-6">
				<strong class="font-semibold">Whoops!</strong> Please fix the following:
				<ul class="mt-2 list-disc list-inside space-y-1 text-sm">
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		<!-- Form Card -->
		<div class="bg-white rounded-xl shadow-md p-6">
			<form action="{{ route('courses.course-sessions.store', $course->id) }}" method="POST" class="space-y-5">
				@csrf

				<!-- Session Name -->
				<div>
					<label for="session_name" class="block text-sm font-medium text-gray-700">Session Name</label>
					<input type="text" name="session_name" id="session_name"
						class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
						value="{{ old('session_name') }}" required>
				</div>

				<!-- Session Date -->
				<div>
					<label for="session_date" class="block text-sm font-medium text-gray-700">Session Date</label>
					<input type="date" name="session_date" id="session_date"
						class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
						value="{{ old('session_date') }}" required>
				</div>

				<!-- Start Time -->
				<div>
					<label for="start_time" class="block text-sm font-medium text-gray-700">Start Time</label>
					<input type="time" name="start_time" id="start_time"
						class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
						value="{{ old('start_time') }}" required>
				</div>

				<!-- End Time -->
				<div>
					<label for="end_time" class="block text-sm font-medium text-gray-700">End Time</label>
					<input type="time" name="end_time" id="end_time"
						class="mt-1 w-full rounded-lg border-gray-300 shadow-sm focus:border-blue-400 focus:ring focus:ring-blue-200 focus:ring-opacity-50 p-2"
						value="{{ old('end_time') }}" required>
				</div>

				<!-- Submit Button -->
				<div class="flex justify-end">
					<button type="submit"
						class="bg-blue-600 hover:bg-blue-700 text-white px-5 py-2 rounded-lg font-medium shadow-sm transition">
						Create Session
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection