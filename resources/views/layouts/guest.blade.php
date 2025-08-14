<!DOCTYPE html>
<html lang="id">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>{{ $title ?? 'AbsenQR' }}</title>
	@vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body class="bg-gradient-to-b from-blue-50 to-white min-h-screen flex items-center justify-center px-4">
	@yield('content')
</body>

</html>