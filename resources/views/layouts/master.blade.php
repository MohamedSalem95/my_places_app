<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title> MyPlaces | @yield('title') </title>

        <!-- include our css and bootstrap css -->
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">

        <!-- include fontawesome via cdn -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous">

    </head>
    <body>
      
        {{-- include our header --}}
        @include('layouts.header')

        <div class="container">
            {{-- include flash messages --}}
            @include('layouts.message')
            @yield('content')
        </div>



        <!-- include our javascript and bootstrap js -->
        <script src="{{ asset('js/app.js') }}"></script>
        @yield('scripts')
    </body>
</html>