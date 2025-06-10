<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Google tag (gtag.js) -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-MB54CC19G5"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());

        gtag('config', 'G-MB54CC19G5');
    </script>

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{asset('/js/bootstrap5.bundle.min.js') }}"></script>
    <script src="{{asset('/js/custom.js') }}"></script>

    <!-- Custom Styles -->
    <link rel="stylesheet" type="text/css" href="{{asset('css/app.css')}}" />
    <link rel="icon" type="image/png" sizes="64x64" href="images/min_logo.png">

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
    <div id="app">
            @include('inc.nav')
            @include('inc.messages')

        <main class="py-4">
            @yield('content')

        </main>

            @include('inc.footer')
    </div>

    <!-- <script src="{{asset('/js/3.5.0.jquery.min.js') }}"></script> -->
    <!-- <script src="https://code.jquery.com/jquery-3.5.0.min.js"></script> -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-5cmQFZ4JJb+L+p+jf9zpZcZ3zvR82bLZp1f1FklZ5MjzE6LwtWZzhPrvA4d0M4PB" crossorigin="anonymous"></script>


</body>
</html>
