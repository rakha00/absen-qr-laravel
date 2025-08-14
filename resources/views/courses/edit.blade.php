@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Edit Course</h1>
		<form action="{{ route('courses.update', $course->id) }}" method="POST">
			@csrf
			@method('PUT')
			<div class="form-group">
				<label for="name">Course Name:</label>
				<input type="text" class="form-control" id="name" name="name" value="{{ $course->name }}" required>
			</div>
			<div class="form-group">
				<label for="code">Course Code:</label>
				<input type="text" class="form-control" id="code" name="code" value="{{ $course->code }}" required>
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" id="description" name="description">{{ $course->description }}</textarea>
			</div>
			<button type="submit" class="btn btn-primary">Update</button>
		</form>
	</div>
@endsection