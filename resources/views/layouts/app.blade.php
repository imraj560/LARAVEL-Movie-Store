<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <link href="{{ asset('assets/css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/styles.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
    <!-- Alertify css -->
    <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    @livewireStyles
</head>
<body>
    <div id="app">

        @include('layouts.inc.frontendnav')

        <main>
            @yield('content')
        </main>

        @include('layouts.inc.frontendfooter')
    </div>

</body>
 <script src="{{ asset('assets/js/bootstrap.js') }}"></script>
 <!--Alertify js-->
 <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
 <script>
    window.addEventListener('message', event => {

        if(event.detail){

            alertify.set('notifier','position', 'top-right');
            alertify.notify(event.detail.text, event.detail.type);

        }


    })
 </script>
   @yield('scripts')
   @livewireScripts
   @stack('script')
</html>
