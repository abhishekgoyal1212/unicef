
<?php 
$first_segments_sidebar = Request::route()->action['as'];
// $segments = request()->segments();
// $first_segments_sidebar = $segments[1];
// $function_name = explode('@', Route::getCurrentRoute()->getActionName())[1];
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
   <link rel="icon"   type="image/x-icon" href="{{asset('public/images/favicon.ico')}}">
  <link rel="stylesheet" href="{{asset('public/admin/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">


  <!-- toastr css-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


  <!-- toastr JS-->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>

</head>
<style>
  *{
    font-family: 'Poppins', sans-serif;
  }
</style>
<body style="background-image: url({{asset('public/admin/img/background.jpg')}}); background-repeat: no-repeat; background-size: cover;background-position: center;">
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
          <img src="{{asset('public/admin/img/userimg.png')}}" alt=""></div>
          <ul class="nav nav-tabs tabs-left d-flex flex-column" role="tablist">

            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo1.png')}} " alt="">
              <a href="{{route('admin.dashboard')}}" aria-controls="Dashboard">Dashboard</a>
            </li>

            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo2.png')}} " alt="">
              <a href="Planing_Platform" aria-controls="Platform" class="
              {{$first_segments_sidebar == 'admin.planingPlatform' ? 'active' : '' }}">Planing Platform</a>
            </li>

            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo3.png')}} " alt="">
              <a href="Social_Mobilization" class="
              {{$first_segments_sidebar == 'admin.socialMobilization' ? 'active' : '' }}">Social Mobilization</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo4.png')}}" alt="">
              <a href="Orientation" aria-controls="orientation"
               class="{{$first_segments_sidebar == 'admin.Orientation' ? 'active' : '' }}">orientation</a>
            </li>

            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo5.png')}} " alt="">
              <a href="Pvt_Bodies" aria-controls="pvt" class="{{$first_segments_sidebar == 'admin.pvtBodies' ? 'active' : '' }}">pvt bodies</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo6.png')}} " alt="">
              <a href="Coordination" aria-controls="Coordination2" class="{{$first_segments_sidebar == 'admin.coordinationMeetingLine' ? 'active' : '' }}">coordination meeting line</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo7.png')}} " alt="">
              <a href="Mass" aria-controls="mass" class="{{$first_segments_sidebar == 'admin.massMediaMidMedia' ? 'active' : '' }}">mass media mid media</a>
            </li>
            <li class="d-block" role="presentation" class="active">
              <img src="{{asset('public/admin/img/logo8.png')}} " alt="">
              <a href="Orientation_Health" aria-controls="health" class="{{$first_segments_sidebar == 'admin.orientationHealth' ? 'active' : '' }}">orientation health</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo9.png')}} " alt="">
              <a href="Iec" aria-controls="iec" class="{{$first_segments_sidebar == 'admin.Iec' ? 'active' : '' }}">iec</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/admin/img/logo10.png')}} " alt="">
              <a href="Groups_Tracking" aria-controls="Groups" class="{{$first_segments_sidebar == 'admin.GroupsTracking' ? 'active' : '' }}">Groups tracking</a>
            </li>
          </ul>
        </div>
        </div>
        @yield('content')
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('public\admin\js\custom.js') }}"></script>
  </body>
  </html>