<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    {{-- <meta content="Free HTML Templates" name="keywords"> --}}
    {{-- Donasi Description --}}

    {!! SEO::generate() !!}

  <!-- MINIFIED -->
  {!! SEO::generate(true) !!}
  <!-- Title -->
  <title>{!! SEO::generate() !!}</title>
    {{-- <meta content="Faris" name="description"> --}}

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('assets/frontend/v1/icon/fajrul-islam.ico') }}">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/frontend/donasi/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/frontend/donasi/lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/frontend/donasi/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/frontend/donasi/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    @include('donasi.tools.spinner')
    <!-- Spinner End -->


    <!-- Topbar Start -->
    @include('donasi.tools.topbar')
    <!-- Topbar End -->


    <!-- Navbar & Carousel Start -->
    @include('donasi.tools.navbar')
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->

    <!-- Full Screen Search End -->


    @yield('content')
    


    <!-- Vendor Start -->


    <!-- Footer Start -->
    @include('donasi.tools.footer')
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{asset('assets/frontend/donasi/lib/wow/wow.min.js')}}"></script>
    <script src="{{asset('assets/frontend/donasi/lib/easing/easing.min.js')}}"></script>
    <script src="{{asset('assets/frontend/donasi/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{asset('assets/frontend/donasi/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{asset('assets/frontend/donasi/lib/owlcarousel/owl.carousel.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{asset('assets/frontend/donasi/js/main.js')}}"></script>
</body>

</html>
