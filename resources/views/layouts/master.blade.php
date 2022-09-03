<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title> Admin | @yield ('title')</title>
    <link rel="shortcut icon" href="{{ asset('images/logo/logo.png') }}" type="image/x-icon">

    <!-- Styles -->
    <link href="{{ asset('css/volt.css') }}" rel="stylesheet">
    <link href="{{ asset('css/animate.min.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
    @yield('styles')

</head>
<body>
    @include('admin/_include/_side')
    
        <main class="content">
            @include('admin/_include/_navbar')

            <div class="loader-bg mt-2">
                <div class="loader"></div>
            </div>
            @include('admin/_include/_header')
            
            @yield('content')

            {{-- @include('include/_footer') --}}
        </main>
    </div>
    @include('include._alert')
    @include('include._script')
</body>
</html>
