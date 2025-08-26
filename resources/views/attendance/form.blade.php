<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Hadir {{ $session->session_name }}</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
	<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
		<h1 class="text-2xl font-bold text-center text-gray-800 mb-6">Hadir {{ $session->session_name }}</h1>

		@if (session('success'))
			<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
				<span class="block sm:inline">{{ session('success') }}</span>
			</div>
		@endif

		@if (session('error'))
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
				<span class="block sm:inline">{{ session('error') }}</span>
			</div>
		@endif

		<form action="{{ route('attendance.store', ['uuid' => $uuid]) }}" method="POST">
			@csrf
			<div class="mb-4">
				<label for="name" class="block text-gray-700 text-sm font-bold mb-2">Nama:</label>
				<input type="text" name="name" id="name"
					class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					value="{{ Auth::user()->name }}" readonly>
			</div>
			<div class="mb-6">
				<label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
				<input type="email" name="email" id="email"
					class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					value="{{ Auth::user()->email }}" readonly>
			</div>
			<div class="mb-6">
				<label for="npm" class="block text-gray-700 text-sm font-bold mb-2">NPM:</label>
				<input type="text" name="npm" id="npm"
					class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline @error('npm') border-red-500 @enderror"
					value="{{ old('npm', Auth::user()->npm) }}" required>
				@error('npm')
					<p class="text-red-500 text-xs italic mt-2">{{ $message }}</p>
				@enderror
			</div>
			<div class="flex items-center justify-between">
				<button type="submit"
					class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
					Kirim Kehadiran
				</button>
			</div>
		</form>
	</div>
</body>

</html>