<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tally Alley - Login</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body style="background-color: #fdf6fb; font-family: 'Helvetica', sans-serif;">
    <div style="display:flex; flex-direction:column; align-items:center; justify-content:center; min-height:100vh;">
        <!-- Logo -->
        <img src="{{ asset('assets/css/images/login.png') }}" alt="Tally Alley Logo" style="width: 170px; margin-bottom: 20px;">
        
        <!-- Page content -->
        {{ $slot }}
    </div>
</body>
</html>
