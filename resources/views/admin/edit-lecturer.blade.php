@extends('layouts.app')

@section('content')
	<div class="max-w-4xl mx-auto px-4 py-8">
		<h1 class="text-3xl font-bold text-gray-800 mb-6">Edit Akun Dosen</h1>

		@if (session('success'))
			<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
				<strong class="font-bold">Berhasil!</strong>
				<span class="block sm:inline">{{ session('success') }}</span>
			</div>
		@endif

		<div class="bg-white shadow-md rounded-lg p-6">
			<form method="POST" action="{{ route('admin.lecturers.update', $user->id) }}">
				@csrf
				@method('PUT')

				<div class="mb-4">
					<label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama</label>
					<input type="text"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('name') border-red-500 @enderror"
						id="name" name="name" value="{{ old('name', $user->name) }}" required autofocus>
					@error('name')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="mb-4">
					<label for="email" class="block text-gray-700 text-sm font-bold mb-2">Alamat Email</label>
					<input type="email"
						class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('email') border-red-500 @enderror"
						id="email" name="email" value="{{ old('email', $user->email) }}" required>
					@error('email')
						<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
					@enderror
				</div>

				<div class="flex items-center justify-between">
					<button type="submit"
						class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
						Perbarui Akun Dosen
					</button>
				</div>
			</form>
		</div>
	</div>
@endsection