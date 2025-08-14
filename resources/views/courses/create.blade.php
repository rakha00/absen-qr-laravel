@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Create New Course</h1>
		<form action="{{ route('courses.store') }}" method="POST">
			@csrf
			<div class="form-group">
				<label for="name">Course Name:</label>
				<input type="text" class="form-control" id="name" name="name" required>
			</div>
			<div class="form-group">
				<label for="code">Course Code:</label>
				<input type="text" class="form-control" id="code" name="code" required>
			</div>
			<div class="form-group">
				<label for="description">Description:</label>
				<textarea class="form-control" id="description" name="description"></textarea>
			</div>
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection