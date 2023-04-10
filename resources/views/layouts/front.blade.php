<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

  <!--Fonts and icons-->
  <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css">

  <link rel="stylesheet" href="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css">

  <link rel="stylesheet" href="//code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css"> 

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
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

    <!-- Style -->

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/bootstrap5.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/custom.css')}}">

    <link rel="stylesheet" href="{{asset('/public/frontend/css/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('/public/frontend/css/owl.theme.default.min.css')}}">

</head>
<body>


  @include('layouts.includes.frontnavbar')


    <div class="content">
      @yield('content')
    </div>

    <div class="whatsapp-chat">
      <a href="https://wa.me/+92445517833?text=I'm%20interested%20in%20your%20car%20for%20sale" target="_blank">
        <img src="{{asset('/public/assets/images/whatsapp-icon.png')}}" alt="whatsapp-chat" height="50px" width="50px">
      </a>
    </div>

   
    <!-- Js -->

    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>

    <!--   Core JS Files   -->
  <script src="{{asset('/public/frontend/js/bootstrap.bundle.min.js')}}"></script>

  <script src="{{asset('/public/frontend/js/jquery-3.6.0.min.js')}}"></script>
  <script src="{{asset('/public/frontend/js/owl.carousel.min.js')}}"></script>

  <!--Start of Tawk.to Script-->
    <script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/6319057354f06e12d8935e2a/1gccrqjon';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
  <!--End of Tawk.to Script-->




 

  <!-- JavaScript Bundle with Popper -->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>

  <script src="	https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js"></script>
 
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

  <script src="{{asset('/public/frontend/js/custom.js')}}"></script>

  <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.js"></script>
  <script>
 
    var availableTags = [];
    $.ajax({
      method:"get",
      url:"{{route('product_list')}}",
      data:"data",
      success: function(response){
        // console.log(response);
        startAutoComplete(response) 

      }
    });
    function startAutoComplete(availableTags) 
    {
      $( "#search_product" ).autocomplete({
      source: availableTags
      });
    }

 
  </script>



  @if(session('status'))

  <script>
  swal("{{session('status')}}");
  </script>

  @endif
  
    @yield('scripts')

   
</body>
</html>
