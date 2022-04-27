<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'Argon Dashboard') }}</title>
        <!-- Favicon -->
        <link href="{{ asset('argon') }}/img/brand/favicon.png" rel="icon" type="image/png">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">
        <!-- Icons -->
        <link href="{{ asset('argon') }}/vendor/nucleo/css/nucleo.css" rel="stylesheet">
        <link href="{{ asset('argon') }}/vendor/@fortawesome/fontawesome-free/css/all.min.css" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('flags/css/flag-icon.min.css') }}">
        <link rel="stylesheet" href="//cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
        <link rel="stylesheet" href="{{ asset('dist/css/countrySelect.css') }}">
      
        <!-- Argon CSS -->
        <link type="text/css" href="{{ asset('argon') }}/css/argon.css?v=1.0.0" rel="stylesheet">
    </head>
    <body class="{{ $class ?? '' }}">
        @auth()
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                @csrf
            </form>
            @include('layouts.navbars.sidebar')
        @endauth
        
        <div class="main-content">
            @include('layouts.navbars.navbar')                
            @yield('content')
        </div>

        {{-- @guest()
                @include('layouts.footers.guest')
            @endguest --}}

        <script src="{{ asset('argon') }}/vendor/jquery/dist/jquery.min.js"></script>
        <script src="{{ asset('argon') }}/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
        
        @stack('js')
        
        <!-- Argon JS -->
        <script src="{{ asset('argon') }}/js/argon.js?v=1.0.0"></script>

        <script src="//cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
        <script>
            $(document).ready( function () {
            $('#myTable').DataTable({
                // "paging" : false,
                // "info": false,
                
              
            });
            $('#myTable_length').addClass('ml-4 mt-3 form-inline ');
            $('select').addClass('custom-select custom-select-sm mx-1');
            $('#myTable_filter').addClass('form-inline');
            $('input[type="search"]').addClass('form-control mr-3 mb-2');

            });
        </script>
    </body>
</html>