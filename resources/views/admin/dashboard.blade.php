@extends('layouts.app')

@section('content')
	<div class="max-w-6xl mx-auto px-4 py-8">
		<h1 class="text-3xl font-bold text-gray-800 mb-6">Dasbor Admin</h1>

		<div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
			<!-- Create Lecturer Card -->
			<a href="{{ route('admin.create-lecturer') }}"
				class="bg-white rounded-lg shadow-md p-6 hover:shadow-lg transition-shadow">
				<h2 class="text-xl font-semibold text-gray-800 mb-2">Buat Akun Dosen</h2>
				<p class="text-gray-600">Tambahkan pengguna dosen baru ke sistem.</p>
			</a>

			<!-- Other Admin functionalities can be added here -->
		</div>
	</div>
@endsection