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

  <link rel="stylesheet" href="{{asset('public/user-assets/css/style.css')}}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="{{ asset('public/admin-assets/css/style.css') }}">
    <!-- npm Charts -->
   
  <!-- toastr css-->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>

  

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
        </div>
        @yield('content')
          </div>
        </div>
      </div>
    </div>
    <script type="text/javascript" src="{{ asset('public\user-assets\js\custom.js') }}"></script>
     <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>


  <!-- toastr JS-->
  <script src="http://code.jquery.com/jquery-1.9.1.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script>
    $('#myHamburger').on('click', function() {
        $('body').toggleClass('sidebar-collapse');
        // if ($('body').hasClass('sidebar-collapse')) {
        //     $('body').removeClass('sidebar-collapse');
        // } else {
        //     $('body').addClass('sidebar-collapse');
        // }
    });

    var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
    var donutData = {
        // labels: [
        //     'Review Meeting',
        //     'Social Mobilization',
        //     'Private Body & Line Department Coordination',
        //     'Mass Media & Mild Media Activity',
        //     'FLWs Stakeholders Trained',
        //     'DCP & IEC Status',
        //     'Vaccination Status',

        // ],
        datasets: [{
            data: [25, 15, 10, 15, 5, 15, 15],
            backgroundColor: ['#d8d0ff', '#ffd7d1', '#ffe6c9', '#cdf3ff', '#fff7d0', '#c9facd', '#ffe7db'],
        }]
    }
    var donutOptions = {
        maintainAspectRatio: false,
        responsive: true,
    }
    //Create pie or douhnut chart
    // You can switch between pie and douhnut using the method below.
    var donutChart = new Chart(donutChartCanvas, {
        type: 'doughnut',
        data: donutData,
        options: donutOptions
    });


    var xValues = [0, '10 sep', '20 sep', '30 sep', '10 oct', '20 oct', '30 oct', '10 nov'];

    new Chart("myChart", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                data: [500, 1140, 1060, 1060, 1070, 1110, 1330, 1110],
                borderColor: "#d8d0ff",
                fill: false
            }, {
                data: [500, 1700, 1700, 1900, 2000, 2700, 1900, 2000],
                borderColor: "#ffd7d1",
                fill: false
            }, {
                data: [500, 1500, 2000, 5000, 6000, 4000, 1500, 2000],
                borderColor: "#ffe6c9",
                fill: false
            }, {
                data: [500, 700, 1060, 1070, 1110, 1600, 4000, 2200],
                borderColor: "#cdf3ff",
                fill: false
            }, {
                data: [500, 700, 2000, 5000, 6000, 4000, 1110, 1330],
                borderColor: "#fff7d0",
                fill: false
            }, {
                data: [500, 700, 2000, 5000, 1110, 1330, 4000, 2000],
                borderColor: "#c9facd",
                fill: false
            }, {
                data: [500, 1700, 2300, 5500, 6000, 4000, 700, 2000],
                borderColor: "#ffe7db",
                fill: false
            }]
        },
        options: {
            legend: {
                display: false
            }
        }
    });
</script>
  </body>
  </html>