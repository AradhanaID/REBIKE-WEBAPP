<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/sass/app.scss'])
    <title>REBIKE</title>
</head>
<body>
    @include('components.navbar')
    <div class="container my-5">
        @yield('content')
    </div>
    @include('components.footer')
</body>
</html>
