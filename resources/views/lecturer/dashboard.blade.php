<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Dashboard Dosen - AbsenQR</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-blue-50 to-white font-sans min-h-screen px-4 py-8">

	<!-- Header -->
	<div class="max-w-6xl mx-auto mb-8">
		<h1 class="text-3xl sm:text-4xl font-extrabold text-gray-800 flex items-center gap-3">
			<svg class="h-8 w-8 text-blue-600" fill="currentColor" viewBox="0 0 24 24">
				<path d="M12 2L2 7v13h20V7l-10-5zm0 2.18L18.09 7H5.91L12 4.18zM4 9h16v9H4V9z" />
			</svg>
			Dashboard Dosen
		</h1>
		<p class="text-gray-600 mt-1">Selamat datang di sistem absensi berbasis QR Code</p>
	</div>

	<!-- Cards -->
	<div class="max-w-6xl mx-auto grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
		<!-- My Courses -->
		<div
			class="bg-white border border-gray-200 rounded-xl shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition transform">
			<div class="flex items-center mb-4">
				<span class="bg-blue-100 text-blue-600 p-3 rounded-lg">
					<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
						<path d="M3 5h18v2H3V5zm0 6h12v2H3v-2zm0 6h18v2H3v-2z" />
					</svg>
				</span>
				<h2 class="text-xl font-semibold text-gray-800 ml-3">Mata Kuliah Saya</h2>
			</div>
			<p class="text-gray-600">Lihat dan kelola mata kuliah yang Anda ampu.</p>
		</div>

		<!-- Attendance Records -->
		<div
			class="bg-white border border-gray-200 rounded-xl shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition transform">
			<div class="flex items-center mb-4">
				<span class="bg-green-100 text-green-600 p-3 rounded-lg">
					<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
						<path d="M19 3H5c-1.1 0-2 .9-2 2v14l4-4h12c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2z" />
					</svg>
				</span>
				<h2 class="text-xl font-semibold text-gray-800 ml-3">Rekap Kehadiran</h2>
			</div>
			<p class="text-gray-600">Akses dan perbarui data kehadiran perkuliahan Anda.</p>
		</div>

		<!-- QR Code Generation -->
		<div
			class="bg-white border border-gray-200 rounded-xl shadow-md p-6 hover:shadow-lg hover:-translate-y-1 transition transform">
			<div class="flex items-center mb-4">
				<span class="bg-yellow-100 text-yellow-600 p-3 rounded-lg">
					<svg class="h-6 w-6" fill="currentColor" viewBox="0 0 24 24">
						<path
							d="M3 3h4v4H3V3zm7 0h4v4h-4V3zm7 0h4v4h-4V3zM3 10h4v4H3v-4zm7 0h4v4h-4v-4zm7 0h4v4h-4v-4zM3 17h4v4H3v-4zm7 0h4v4h-4v-4zm7 0h4v4h-4v-4z" />
					</svg>
				</span>
				<h2 class="text-xl font-semibold text-gray-800 ml-3">Buat QR Code</h2>
			</div>
			<p class="text-gray-600">Hasilkan QR Code untuk sesi absensi kelas.</p>
		</div>
	</div>

</body>

</html>