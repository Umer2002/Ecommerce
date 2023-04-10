<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

  <!--Fonts and icons-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <!-- Nucleo Icons -->
  <link href="{{asset('/public/admin/assets/css/nucleo-icons.css')}}" rel="stylesheet" />
  <link href="{{asset('/public/admin/assets/css/nucleo-svg.css')}}" rel="stylesheet" />

  <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">

  <!-- Font Awesome Icons -->
  <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.2/css/fontawesome.min.css" integrity="sha384-X8QTME3FCg1DLb58++lPvsjbQoCT9bp3MsUU3grbIny/3ZwUJkRNO8NPW6zqzuW9" crossorigin="anonymous">

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.2/css/all.css"
 integrity="sha384-vSIIfh2YWi9wW0r9iZe7RJPrKwp6bG+s9QZMoITbCckVJqGCCRhc+ccxNcdpHuYu"
  crossorigin="anonymous">

  <!-- Material Icons -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">

  <!-- CSS Files -->
  <link id="pagestyle" href="{{asset('/public/admin/assets/css/material-dashboard.css?v=3.0.4')}}" rel="stylesheet" />

  <link id="pagestyle" href="{{asset('/public/admin/assets/css/material-dashboard.css')}}" rel="stylesheet" />

  

    <!-- Style -->
    <link rel="stylesheet" href="{{asset('/public/admin/assets/css/material-dashboard.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/custom.css')}}">

</head>
<body>

  <aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-gradient-dark">
    <!-- Sidebar -->
    @include('layouts.includes.sidebar')
  </aside>

  <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">

    <!-- Navbar -->
      @include('layouts.includes.adminnavbar')
    <!-- End Navbar -->

    <!--Content-->
    <div>
      @yield('content')
    </div>

    <div class="container-fluid py-4">
      @include('layouts.includes.adminfooter')
    </div>
  </main>

    <!--   Core JS Files   -->
  <script src="{{asset('/public/admin/assets/js/core/popper.min.js')}}"></script>
  <script src="{{asset('/public/admin/assets/js/core/bootstrap.min.js')}}"></script>
  <script src="{{asset('/public/admin/assets/js/plugins/perfect-scrollbar.min.js')}}"></script>
  <script src="{{asset('/public/admin/assets/js/plugins/smooth-scrollbar.min.js')}}"></script>
  <script src="{{asset('/public/admin/assets/js/plugins/chartjs.min.js')}}"></script>

  <!-- Github buttons -->
  <script async defer src="https://buttons.github.io/buttons.js"></script>
  <!-- Control Center for Material Dashboard: parallax effects, scripts for the example pages etc -->
  <script src="{{asset('/public/admin/assets/js/material-dashboard.min.js?v=3.0.4')}}"></script>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{asset('/public/frontend/js/custom.js')}}"></script>


  @if(session('status'))

  <script>
  swal("{{session('status')}}");
  </script>

  @endif
  
    @yield('scripts')

   
</body>
</html>
