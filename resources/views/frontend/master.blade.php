<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="description" content="uza - Model Agency HTML5 Template">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Title -->
  <title>Fajrul Islam</title>

  <!-- Favicon -->
  <link rel="icon" href="{{ asset('assets/frontend/v1/img/core-img/favicon.ico') }}">

  <!-- Core Stylesheet -->
  <link rel="stylesheet" href="{{ asset('assets/frontend/v1/style.css') }}">
  @section('afterSytle')
</head>

<body>
  <!-- Preloader -->


  <!-- ***** Top Search Area Start ***** -->

  <!-- ***** Top Search Area End ***** -->

  <!-- ***** Header Area Start ***** -->
  @include('frontend.tools.header')
  <!-- ***** Header Area End ***** -->

  <!-- ***** Welcome Area Start ***** -->

  <!-- ***** Welcome Area End ***** -->

  @yield('content')


  <!-- ***** Blog Area Start ***** -->

  <!-- ***** Blog Area End ***** -->

  <!-- ***** Acara Area Start ***** -->

  <!-- ***** Blog Area End ***** -->

  <!-- ***** Newsletter Area Start ***** -->

  <!-- ***** Newsletter Area End ***** -->

  <!-- ***** Footer Area Start ***** -->
  @include('frontend.tools.footer')
  <!-- ***** Footer Area End ***** -->

  <!-- ******* All JS Files ******* -->
  <!-- jQuery js -->
  <script src="{{ asset('assets/frontend/v1/js/jquery.min.js') }}"></script>
  <!-- Popper js -->
  <script src="{{ asset('assets/frontend/v1/js/popper.min.js') }}"></script>
  <!-- Bootstrap js -->
  <script src="{{ asset('assets/frontend/v1/js/bootstrap.min.js') }}"></script>
  <!-- All js -->
  <script src="{{ asset('assets/frontend/v1/js/uza.bundle.js') }}"></script>
  <!-- Active js -->
  <script src="{{ asset('assets/frontend/v1/js/default-assets/active.js') }}"></script>
  @section('AfterScript')
</body>

</html>
