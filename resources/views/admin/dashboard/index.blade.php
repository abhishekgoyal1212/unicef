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
  <link rel="icon"   type="image/x-icon" href="{{asset('public/images/favicon.icon')}}">
  <link rel="stylesheet" href="{{asset('public/user-assets/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <!-- Dashboard css -->
  <link rel="stylesheet" href="{{ asset('public/dashboard/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/dashboard/calander/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/dashboard/css/bootstrap-multiselect.css') }}" type="text/css">
  <!-- toastr css-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

  <!-- datepicker css-->
  <link href="{{asset('public/template/plugins/datepicker/jquery-ui.css')}}" rel="stylesheet"/>

  <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>

  <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
  <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>

  <script src="https://cdn.anychart.com/releases/v8/js/anychart-circular-gauge.min.js"></script>


  <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
  <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">

  <!-- npm Charts -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
  <script src="{{ asset('public/admin-assets/js/chart.js/Chart.min.js') }}"></script>


  <!-- toastr JS-->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>


  
  <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>


  <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
  <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

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
          <img class="rounded-circle" src="{{asset('public/users-image/'. auth()->user()->profile)}}" alt="" width="100" height="100"></div>
          <ul class="nav nav-tabs tabs-left d-flex flex-column" role="tablist">

            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo1.png')}} " alt="">
              <a href="{{route('admin.dashboard')}}" aria-controls="Dashboard" class="{{$first_segments_sidebar == 'admin.dashboard' ? 'active' : ''}}">Dashboard</a>
            </li>

            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo2.png')}} " alt="">
              <a href="Planing_Platform" aria-controls="Platform" class="
              {{$first_segments_sidebar == 'admin.planingPlatform' ? 'active' : '' }}">Planing Platform</a>
            </li>

            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo2.png')}} " alt="">
              <a href="{{route('admin.Dcp')}}" aria-controls="Platform" class="
              {{$first_segments_sidebar == 'admin.Dcp' ? 'active' : '' }}">District Communication Plan</a>
            </li>

            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo3.png')}} " alt="">
              <a href="Social_Mobilization" class="
              {{$first_segments_sidebar == 'admin.socialMobilization' ? 'active' : '' }}">Social Mobilization</a>
            </li>


            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo4.png')}}" alt="">
              <a href="Orientation" aria-controls="orientation"
              class="{{$first_segments_sidebar == 'admin.Orientation' ? 'active' : '' }}">orientation</a>
            </li>

            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo5.png')}} " alt="">
              <a href="Pvt_Bodies" aria-controls="pvt" class="{{$first_segments_sidebar == 'admin.pvtBodies' ? 'active' : '' }}">pvt bodies</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo6.png')}} " alt="">
              <a href="Coordination" aria-controls="Coordination2" class="{{$first_segments_sidebar == 'admin.coordinationMeetingLine' ? 'active' : '' }}">coordination meeting line</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo7.png')}} " alt="">
              <a href="Mass" aria-controls="mass" class="{{$first_segments_sidebar == 'admin.massMediaMidMedia' ? 'active' : '' }}">mass media mid media</a>
            </li>
            <li class="d-block" role="presentation" class="active">
              <img src="{{asset('public/user-assets/img/logo8.png')}} " alt="">
              <a href="Orientation_Health" aria-controls="health" class="{{$first_segments_sidebar == 'admin.orientationHealth' ? 'active' : '' }}">orientation health</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo9.png')}} " alt="">
              <a href="Iec" aria-controls="iec" class="{{$first_segments_sidebar == 'admin.Iec' ? 'active' : '' }}">iec</a>
            </li>
            <li class="d-block" role="presentation">
              <img src="{{asset('public/user-assets/img/logo10.png')}} " alt="">
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
<script type="text/javascript" src="{{ asset('public\user-assets\js\custom.js') }}"></script>

<script src="{{ asset('public/dashboard/js/amCharts.js') }}" ></script>


<script src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
<script src="{{url('public/dashboard/calander/jquery.simple-calendar.js')}}"></script>
<script type="text/javascript" src="{{url('public/dashboard/js/bootstrap-multiselect.js')}}"></script>

<!-- datepicker js -->
<script src="{{asset('public/template/plugins/datepicker/jquery-ui.js')}}"></script>

<!-- Styles -->
<style>


  #chartdiv {
    width: 100%;
    height: 350px;
    background-color: white;
  }
  #amchart {
    width: 100%;
    height: 350px;
    background-color: white;
  }
  #amchart2 {
    width: 100%;
    height: 350px;
    background-color: white;
  }


</style>
<script>
  var $calendar;
  $(document).ready(function () {
    let container = $("#container").simpleCalendar({
          fixedStartDay: 0, // begin weeks by sunday
          disableEmptyDetails: true,
          events: [
            // generate new event after tomorrow for one hour
            {
              startDate: new Date(new Date().setHours(new Date().getHours() + 24)).toDateString(),
              endDate: new Date(new Date().setHours(new Date().getHours() + 25)).toISOString(),
              summary: 'Visit of the Eiffel Tower'
            },
            // generate new event for yesterday at noon
            {
              startDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 12, 0)).toISOString(),
              endDate: new Date(new Date().setHours(new Date().getHours() - new Date().getHours() - 11)).getTime(),
              summary: 'Restaurant'
            },
            // generate new event for the last two days
            {
              startDate: new Date(new Date().setHours(new Date().getHours() - 48)).toISOString(),
              endDate: new Date(new Date().setHours(new Date().getHours() - 24)).getTime(),
              summary: 'Visit of the Louvre'
            }
            ],

          });
    $calendar = container.data('plugin_simpleCalendar')
  });
</script>
<script>
  $(document).ready(function() {
    $('#showmenu').click(function() {
      $('.deshboard-conteant-sec').slideToggle("");
    });
  });
</script>

</body>
</html>