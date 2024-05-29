<!-- resources/views/layouts/app.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>My Library App</title>
    <!-- Aquí puedes incluir tus hojas de estilo CSS -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>
<body>
    <div class="container">
        @yield('content')
    </div>
    <!-- Aquí puedes incluir tus scripts JavaScript -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
