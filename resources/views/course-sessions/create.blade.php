@extends('layouts.app')

@section('content')
	<div class="container mx-auto px-4 py-8">
		<div class="flex justify-between items-center mb-4">
			<h1 class="text-2xl font-semibold">Create New Session for {{ $course->name }}</h1>
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
			<form action="{{ route('courses.course-sessions.store', $course->id) }}" method="POST">
				@csrf
				<div class="mb-4">
					<label for="session_name" class="block text-sm font-medium text-gray-700">Session Name</label>
					<input type="text" name="session_name" id="session_name"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
						value="{{ old('session_name') }}" required>
				</div>
				<div class="mb-4">
					<label for="session_date" class="block text-sm font-medium text-gray-700">Session Date and Time</label>
					<input type="datetime-local" name="session_date" id="session_date"
						class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
						value="{{ old('session_date') }}" required>
				</div>
				<button type="submit" class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded-md">Create
					Session</button>
			</form>
		</div>
	</div>
@endsection