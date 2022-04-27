<?php
$segments = request()->segments();
$last = end($segments);
$second = count($segments) > 2 ? $segments[count($segments) - 2] : '';
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
   <link rel="icon"   type="image/x-icon" href="{{asset('public/images/favicon.ico')}}">
  <link rel="stylesheet" href="{{asset('public/user-assets/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


    <!-- npm Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="//cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>




    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>

    <script src="https://cdn.anychart.com/releases/v8/js/anychart-circular-gauge.min.js"></script>


    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">
</head>
<style>
  *{
    font-family: 'Poppins', sans-serif;
  }
</style>
<body style="background-image: url({{asset('public/user-assets/img/background.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: center;">
  @if(session('flash-error'))
  <script> toastr["error"] ("{{session()->get('flash-error')}}") </script>
  @endif
  @if ( session('flash-success'))
  <script> toastr["success"]("{{session()->get('flash-success')}}") </script>
  @endif
 <div class="row">
      <div class="col-sm-3">
        <div class="sidebar">
          <div class="userimg">
          <img src="{{asset('public/user-assets/img/userimg.png')}}" alt=""></div>
          <ul class="nav nav-tabs tabs-left d-flex flex-column" role="tablist">

            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo1.png')}} " alt="">
              <a href="{{route('admin.dashboard')}}" aria-controls="Dashboard" class="{{$first_segments_sidebar == 'admin.dashboard' ? 'active' : ''}}">Dashboard</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logout.png')}} " alt="">
              <a href="{{route('admin.admin.logout')}}" aria-controls="Dashboard" class="{{$first_segments_sidebar == 'admin.dashboard' ? 'active' : ''}}">Logout</a>
            </li>
          </ul>
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="<?= url('/admin') ?>">SBCC Fact Sheet</a>.</strong>
            All rights reserved.
        </footer>

        <!-- /.control-sidebar -->
    </div>
    <script type="text/javascript" src="{{ asset('public\user-assets\js\custom.js') }}"></script>
  </body>
  </html>
