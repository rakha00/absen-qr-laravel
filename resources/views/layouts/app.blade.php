<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ config('app.name', 'Absensi QR') }}</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 text-gray-800">

	<!-- Navbar -->
	<header class="bg-white border-b border-gray-200 shadow-sm">
		<div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
			<div class="flex justify-between items-center h-16">

				<!-- Logo -->
				<a href="{{ route('dashboard') }}" class="flex items-center gap-2">
					<span class="text-lg font-bold">{{ config('app.name', 'Absensi QR') }}</span>
				</a>

				<!-- Desktop Menu -->
				<div class="hidden md:flex items-center gap-4">
					<a href="{{ route('profile.edit') }}" class="text-sm text-gray-600 hover:text-gray-900">Halo, {{ Auth::user()->name }}</a>
					<form action="{{ route('logout') }}" method="POST">
						@csrf
						<button type="submit"
							class="bg-red-500 hover:bg-red-600 text-white px-4 py-1.5 rounded-lg text-sm font-medium transition">
							Keluar
						</button>
					</form>
				</div>

				<!-- Mobile Menu Button -->
				<button id="mobile-menu-button" class="md:hidden p-2 rounded-lg hover:bg-gray-100 focus:outline-none">
					<svg class="h-6 w-6 text-gray-700" fill="none" stroke="currentColor" stroke-width="2"
						viewBox="0 0 24 24">
						<path stroke-linecap="round" stroke-linejoin="round" d="M4 6h16M4 12h16M4 18h16" />
					</svg>
				</button>
			</div>
		</div>

		<!-- Mobile Menu -->
		<div id="mobile-menu" class="hidden md:hidden border-t border-gray-200 bg-white">
			<div class="px-4 py-3 space-y-3">
				<a href="{{ route('profile.edit') }}" class="block text-sm text-gray-600 hover:text-gray-900">Halo, {{ Auth::user()->name }}</a>
				<form action="{{ route('logout') }}" method="POST">
					@csrf
					<button type="submit"
						class="w-full bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded-lg text-sm font-medium transition">
						Logout
					</button>
				</form>
			</div>
		</div>
	</header>

	<!-- Main Content -->
	<main class="px-4 py-6">
		@yield('content')
	</main>

	<!-- Mobile Menu Toggle Script -->
	<script>
		document.getElementById('mobile-menu-button').addEventListener('click', function () {
			const menu = document.getElementById('mobile-menu');
			menu.classList.toggle('hidden');
		});
	</script>

</body>

</html>