<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Absen QR</title>

	<!-- Fonts -->
	<link rel="preconnect" href="https://fonts.bunny.net">
	<link href="https://fonts.bunny.net/css?family=figtree:400,600&display=swap" rel="stylesheet" />

	<!-- Styles -->
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="antialiased bg-gray-50">

	<!-- Navbar -->
	<header class="w-full flex justify-center items-center px-4 py-4 bg-white/80 backdrop-blur-md shadow-sm">
		<div class="text-xl font-bold text-blue-600">AbsenQR</div>
	</header>

	<!-- Hero Section -->
	<section
		class="flex flex-col items-center justify-center min-h-screen px-6 py-12 text-center bg-gradient-to-b from-blue-50 to-white">
		<!-- Logo / Icon -->
		<svg class="h-24 w-24 text-blue-600 mb-6" fill="currentColor" viewBox="0 0 24 24">
			<path
				d="M3 3h4v4H3V3zm7 0h4v4h-4V3zm7 0h4v4h-4V3zM3 10h4v4H3v-4zm7 0h4v4h-4v-4zm7 0h4v4h-4v-4zM3 17h4v4H3v-4zm7 0h4v4h-4v-4zm7 0h4v4h-4v-4z" />
		</svg>

		<h1 class="text-3xl sm:text-5xl font-extrabold text-gray-800 mb-4">
			Sistem Absensi QR Code
		</h1>
		<p class="text-base sm:text-lg text-gray-600 max-w-md sm:max-w-2xl mb-8">
			Absen lebih cepat, mudah, dan akurat dengan teknologi QR Code.
		</p>

		<!-- CTA Buttons -->
		<div class="flex flex-col w-full sm:w-auto sm:flex-row gap-3 sm:gap-4">
			<a href="{{ route('login') }}"
				class="w-full sm:w-auto px-6 py-3 bg-blue-600 hover:bg-blue-700 text-white font-semibold rounded-lg shadow-lg transition">
				Mulai Sekarang
			</a>
			<a href="{{ route('register') }}"
				class="w-full sm:w-auto px-6 py-3 bg-white border border-gray-300 hover:border-blue-600 hover:text-blue-600 font-semibold rounded-lg shadow-lg transition">
				Daftar Akun
			</a>
		</div>
	</section>

	<!-- Footer -->
	<footer class="py-6 text-center text-xs sm:text-sm text-gray-500 border-t border-gray-200">
		&copy; {{ date('Y') }} AbsenQR. Semua Hak Dilindungi.
	</footer>

</body>

</html>