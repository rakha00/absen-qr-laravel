<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Lecturer Dashboard</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gray-100 font-sans leading-normal tracking-normal">
	<div class="container mx-auto mt-10 p-5 bg-white shadow-md rounded-lg">
		<h1 class="text-3xl font-bold mb-6 text-gray-800">Lecturer Dashboard</h1>
		<p class="text-gray-700">Welcome to your lecturer dashboard!</p>
		<div class="mt-8 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
			<div class="bg-blue-100 p-6 rounded-lg shadow-md">
				<h2 class="text-xl font-semibold text-blue-800 mb-2">My Courses</h2>
				<p class="text-blue-700">View and manage your assigned courses.</p>
			</div>
			<div class="bg-green-100 p-6 rounded-lg shadow-md">
				<h2 class="text-xl font-semibold text-green-800 mb-2">Attendance Records</h2>
				<p class="text-green-700">Access and update attendance for your classes.</p>
			</div>
			<div class="bg-yellow-100 p-6 rounded-lg shadow-md">
				<h2 class="text-xl font-semibold text-yellow-800 mb-2">QR Code Generation</h2>
				<p class="text-yellow-700">Generate QR codes for attendance sessions.</p>
			</div>
		</div>
	</div>
</body>

</html>