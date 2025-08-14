@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Course List</h1>
		<a href="{{ route('courses.create') }}" class="btn btn-primary">Add New Course</a>
		<table class="table">
			<thead>
				<tr>
					<th>ID</th>
					<th>Name</th>
					<th>Code</th>
					<th>Description</th>
					<th>Actions</th>
				</tr>
			</thead>
			<tbody>
				@foreach ($courses as $course)
					<tr>
						<td>{{ $course->id }}</td>
						<td>{{ $course->name }}</td>
						<td>{{ $course->code }}</td>
						<td>{{ $course->description }}</td>
						<td>
							<a href="{{ route('courses.show', $course->id) }}" class="btn btn-info">View</a>
							<a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
							<form action="{{ route('courses.destroy', $course->id) }}" method="POST" style="display:inline;">
								@csrf
								@method('DELETE')
								<button type="submit" class="btn btn-danger">Delete</button>
							</form>
						</td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@endsection