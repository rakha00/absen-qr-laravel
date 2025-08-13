<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	@vite('resources/css/app.css')
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
	<div class="bg-white p-8 rounded-lg shadow-md w-full max-w-md">
		<h2 class="text-2xl font-bold mb-6 text-center">Login</h2>

		@if ($errors->any())
			<div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative mb-4" role="alert">
				<ul>
					@foreach ($errors->all() as $error)
						<li>{{ $error }}</li>
					@endforeach
				</ul>
			</div>
		@endif

		@if (session('success'))
			<div class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative mb-4" role="alert">
				{{ session('success') }}
			</div>
		@endif

		<form action="/login" method="POST">
			@csrf
			<div class="mb-4">
				<label for="email" class="block text-gray-700 text-sm font-bold mb-2">Email:</label>
				<input type="email" name="email" id="email"
					class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline"
					value="{{ old('email') }}" required>
			</div>
			<div class="mb-6">
				<label for="password" class="block text-gray-700 text-sm font-bold mb-2">Password:</label>
				<input type="password" name="password" id="password"
					class="shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
					required>
			</div>
			<div class="flex items-center justify-between">
				<button type="submit"
					class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline">
					Login
				</button>
				<a href="/register"
					class="inline-block align-baseline font-bold text-sm text-blue-500 hover:text-blue-800">
					Don't have an account? Register
				</a>
			</div>
		</form>
	</div>
</body>

</html>