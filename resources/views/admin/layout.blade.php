<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>@yield('title','Admin') | {{ config('app.name') }}</title>
        <link rel="icon" type="image/png" href="{{url('favicon.PNG')}}">
        <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{url('fontawesome/css/all.min.css')}}">
        <link rel="stylesheet" href="{{url('css/dashboard.css')}}">
        @stack('css')
    </head>
    <body>

        @include('admin.navbar')

        <div class="container-fluid">
            <div class="row">
                @include('admin.sidebar')
                <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                    @yield('content')
                </main>
            </div>
        </div>

        @stack('modal')
        <script src="{{url('js/jquery.slim.min.js')}}"></script>
        <script src="{{url('js/popper.min.js')}}"></script>
        <script src="{{url('js/bootstrap.min.js')}}"></script>
        @stack('js')
    </body>
</html>