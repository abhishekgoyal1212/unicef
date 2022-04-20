<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  </head>
  <style>
  *{
  font-family: 'Poppins', sans-serif;
  }
   </style>
  <body style="background: url(background.jpg); background-repeat: no-repeat; background-size: cover;background-position: center;">
       <div class="container-fluid">
      <div class="row">
        <div class="col-sm-3">
          <div class="sidebar">
          <div class="userimg">
          <img src="{{asset('public/admin/img/userimg.png')}} " alt=""></div>
          <ul class="nav nav-tabs tabs-left d-flex flex-column" role="tablist">
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo1.png')}} " alt="">
              <a href="#Dashboard" aria-controls="Dashboard">Dashboard</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo2.png')}} " alt="">
              <a href="Planing_Platform" aria-controls="Platform" >Planing Platform</a>
            </li>


            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo3.png')}} " alt="">
              <a href="Social_Mobilization" >Social Mobilization</a>
            </li>



            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo4.png')}}" alt="">
              <a href="Orientation" aria-controls="orientation" >orientation</a>
            </li>


            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo5.png')}} " alt="">
              <a href="Pvt_Bodies" aria-controls="pvt" >pvt bodies</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo6.png')}} " alt="">
              <a href="Coordination" aria-controls="Coordination2" >coordination meeting line</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo7.png')}} " alt="">
              <a href="Mass" aria-controls="mass" >mass media mid media</a>
            </li>
            <li class="d-block" role="presentation" >
              <img src="{{asset('public/admin/img/logo8.png')}} " alt="">
              <a href="Orientation_Health" aria-controls="health" >orientation health</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo9.png')}} " alt="">
              <a href="Iec" aria-controls="iec" >iec</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo10.png')}} " alt="">
              <a href="Groups_Tracking" aria-controls="Groups" >Groups tracking</a>
            </li>
          </ul>
        </div>
        </div>


    @yield('content')


          </div>
    </div>

    <script type="text/javascript" src="{{ asset('public\admin\js\custom.js') }}"></script>
  </body>
</html>
    