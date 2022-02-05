<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Fajrul Islam</title>
    <link rel="stylesheet" href="{{asset('assets/frontend/bootstrap/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:500,600&amp;display=swap">
    <link rel="stylesheet" href="{{asset('assets/frontend/fonts/fontawesome-all.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/fonts/ionicons.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/frontend/css/styles.min.css')}}">
</head>

<body style="background: url('{{asset('assets/frontend/img/bg-aurora-full.png')}}');background-size: cover;font-family: Poppins, sans-serif;">
    <div class="container" style="width: 1200px;margin-bottom: 9rem;">
        <!-- Start: Navigation Clean -->
        @include('users.tools.navbar')
        @include('users.tools.carosuel')
    </div><!-- Start: 1 Row 2 Columns -->
    @yield('content')
   @include('users.tools.newsletter')
    @include('users.tools.footer')
    <script src="{{asset('assets/frontend/bootstrap/js/bootstrap.min.js')}}"></script>
</body>

</html>
