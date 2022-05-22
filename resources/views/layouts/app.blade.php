<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Font Awesome -->
    <script src="https://kit.fontawesome.com/20a405268e.js" crossorigin="anonymous"></script>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
</head>

<body class="font-sans antialiased">

    <header class="bg-white shadow top-0 z-50 sticky">
        @include('layouts.navigation')
    </header>

    <main>
        <div class="container px-5 mx-auto">
            <div class="flex flex-wrap -m-4">
                @include('layouts.navigation-left')
                <div class="w-1/2">
                    {{ $slot }}
                </div>
            </div>
        </div>
    </main>
    </div>
</body>

</html>