<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1,shrink-to-fit=no">

    <!-- CSRF Token -->
     <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/blog.css') }}">
</head>
<body>
    <header>
        @include('layouts.nav')

        @if ($flash = session('message'))
            <div class="alert alert-success" id="flash-message" role="alert">
                {{ session('message') }}{{-- {{ $flash }} --}}
            </div>
        @endif
        @if ($flash = session('error'))
            <div class="alert alert-error" id="flash-message" role="alert">
                {{ session('error') }}{{-- {{ $flash }} --}}
            </div>
        @endif

        <div class="blog-header">
        <div class="container">

                    <h1 class="blog-title" style="font-size: 3rem">Playground</h1>
                    <p class="lead blog-description">An example blog app to put in practice my skills</p>


                    @if(Route::currentRouteName() != 'posts.create' && Auth::check())
                     <a href="{{ route('posts.create') }}" class="btn btn-primary" role="button" >Create a post</a>
                    @endif
            </div>
        </div>
      </div>
    </header>

    <main class="container" role="main">
        <div class="row">
            @yield('content')
            @include('layouts.sidebar')
        </div>
    </main>

    @include('layouts.footer')
    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
     <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
