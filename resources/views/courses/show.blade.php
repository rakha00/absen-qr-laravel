@extends('layouts.app')

@section('content')
	<div class="container">
		<h1>Course Details</h1>
		<div class="card">
			<div class="card-header">
				Course Information
			</div>
			<div class="card-body">
				<h5 class="card-title">{{ $course->name }} ({{ $course->code }})</h5>
				<p class="card-text">{{ $course->description }}</p>
				<a href="{{ route('courses.index') }}" class="btn btn-primary">Back to List</a>
			</div>
		</div>
	</div>
@endsection