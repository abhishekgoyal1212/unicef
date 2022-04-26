@extends('admin.dashboard.index')
@section('title','Dashboard')
@section('content')
<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" href="{{ asset('public/dashboard/css/style.css') }}">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@100;300;400;500;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="{{ asset('public/dashboard/calander/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('public/dashboard/css/bootstrap-multiselect.css') }}" type="text/css">
</head>
<body>
  <div class="col-sm-9">
    <div class=''>
      <div class="tab-content">
        <div id="Covid" class="tab-pane fade show active">
          <div class="row mb-5">
            <div class="col-md-8 pt-5 pr-5">
              <div class="row">
                <div class="col-md-9">
                  <h3>{{auth()->user()->name}}</h3>
                  <p>Welcome back !!</p>
                </div>
                <div class="col-md-3 d-flex flex-column">

                  <img src="{{ asset('public/dashboard/img/aravali.png') }}" class="img-fluid" alt="">
                  <h2>ARAVALI</h2>
                </div>
              </div>
              <div class="row report-post mt-lg-0 my-4">
                <div class="col-md-12">
                  <img src="{{ asset('public/dashboard/img/report-post.jpg') }}" class="img-fluid" alt="">
                </div>
              </div>
              <div class="row report-data">
                <div class="col-xl-3 col-lg-6 my-lg-2">
                  <div class="report-box bg-white">
                    <select name="" id="mySelect" class="" multiple="multiple">
                      <option value="">January</option>
                      <option value="">February</option>
                      <option value="">March</option>
                      <option value="">April</option>
                      <option value="">May</option>
                      <option value="">June</option>
                      <option value="">July</option>
                      <option value="">August</option>
                      <option value="">September</option>
                      <option value="">October</option>
                      <option value="">November</option>
                      <option value="">December</option>
                    </select>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 my-lg-2">
                  <div class="report-box bg-white text-center">
                    <p class="mb-0">Communication Activity</p>
                    <h4 class="mb-0">3271</h4>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 my-lg-2">
                  <div class="report-box bg-white text-center">
                    <p class="mb-0">Mass Media Activity</p>
                    <h4 class="mb-0">230</h4>
                  </div>
                </div>
                <div class="col-xl-3 col-lg-6 my-lg-2">
                  <div class="report-box bg-white text-center">
                    <p class="mb-0">Training Activity</p>
                    <h4 class="mb-0">298</h4>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-4 pl-5">
              <span class="logout">Logout</span>
              <div class="calender logout-calender bg-white p-2">
                <div class="logo text-center mb-3">

                  <img src="{{ asset('public/dashboard/img/unicefnewlogo.png') }}" class="mt-2" alt="">
                </div>


                <div class="cal text-center py-3 border-top">
                 <div id="container" class="calendar-container"></div>

                 {{--<img src="{{ asset('public/dashboard/img/cal.jpg') }}" class="img-fluid" alt="">--}}
               </div>
             </div>
           </div>
         </div>
         <div class="row my-4">
          <div class="col-md-6 pr-lg-4">
            <h4 class="mb-4">Communication Activity Outreach</h4>
            <div id="amchart"></div>
            {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
          </div>
          <div class="col-md-6 pl-lg-4">
            <h4 class="mb-4">Mass Media Outreach</h4>
            <div id="amchart2"></div>
            {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
          </div>
        </div>
        <div class="row my-4">
          <div class="col-md-6 pr-lg-4 ">
            <div class="bg-white p-4" style="height: 350px;">
              <div class="row mt-4">
                <div class="col-md-1">
                  <div class="dot_round progress_cricle"><i class="fa fa-circle"></i></div>
                </div>    
                <div class="col-md-10">
                  <div class="progressive_bars" >
                    <div class="progress  ">    
                      <div class="progress-bar progress_bg " style="width:87%">Sirohi</div>
                      <div class="progress-bar bg-white progress_text"  style="width:13%">908</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="dot_round progress_cricle"><i class="fa fa-circle"></i></div>
                </div>
              </div>                   
              <div class="row mt-4">
                <div class="col-md-1">
                  <div class="dot_round progress_cricle1"><i class="fa fa-circle"></i></div>
                </div>    
                <div class="col-md-10">
                  <div class="progressive_bars" >
                    <div class="progress  ">
                      <div class="progress-bar progress_bg1" style="width:80%">Jaisalmer</div>
                      <div class="progress-bar bg-white progress_text1" style="width:20%">533</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="dot_round progress_cricle1"><i class="fa fa-circle"></i></div>
                </div>
              </div>                    
              <div class="row mt-4">
                <div class="col-md-1">
                  <div class="dot_round progress_cricle2"><i class="fa fa-circle"></i></div>
                </div>    
                <div class="col-md-10">
                  <div class="progressive_bars" >
                    <div class="progress  ">
                      <div class="progress-bar progress_bg2" style="width:70%">Dungarpur</div>
                      <div class="progress-bar bg-white progress_text2" style="width:30%">418</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="dot_round progress_cricle2"><i class="fa fa-circle"></i></div>
                </div>
              </div>                     
              <div class="row mt-4" >
                <div class="col-md-1">
                  <div class="dot_round progress_cricle3" ><i class="fa fa-circle"></i></div>
                </div>    
                <div class="col-md-10">
                  <div class="progressive_bars" >
                    <div class="progress  ">
                      <div class="progress-bar progress_bg3" style="width:60%">Karauli</div>
                      <div class="progress-bar bg-white progress_text3" style="width:40%">293</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="dot_round progress_cricle3"><i class="fa fa-circle"></i></div>
                </div>
              </div>                     
              <div class="row mt-4" >
                <div class="col-md-1">
                  <div class="dot_round progress_cricle4"><i class="fa fa-circle"></i></div>
                </div>    
                <div class="col-md-10">
                  <div class="progressive_bars" >
                    <div class="progress  ">
                      <div class="progress-bar progress_bg4" style="width:50%">Baran</div>
                      <div class="progress-bar bg-white progress_text4" style="width:50%">166</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="dot_round progress_cricle4"><i class="fa fa-circle"></i></div>
                </div>
              </div>

              <div class="row mt-4" >
                <div class="col-md-1">
                  <div class="dot_round progress_cricle5"><i class="fa fa-circle"></i></div>
                </div>    
                <div class="col-md-10">
                  <div class="progressive_bars" >
                    <div class="progress  ">
                      <div class="progress-bar progress_bg5   " style="width:40%">Dholpur</div>
                      <div class="progress-bar bg-white progress_text5" style="width:60%">97</div>
                    </div>
                  </div>
                </div>
                <div class="col-md-1">
                  <div class="dot_round progress_cricle5"><i class="fa fa-circle"></i></div>
                </div>
              </div>
            </div>

            {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
          </div>
          <div class="col-md-6 pl-lg-4">
            <div id="chartdiv"></div>
            {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
          </div>
        </div>
      </div>

      <div id="Communication" class="tab-pane fade">
        <div class="header">
          <h4>Communication Act..</h4>
        </div>
      </div>
    </div>
  </div>

</div>

</div>
</section>
</body>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://cdn.amcharts.com/lib/5/index.js"></script>
<script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>


<script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
<script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>

<script src="{{ asset('public/dashboard/js/amCharts.js') }}" ></script>



<script src="https://code.jquery.com/jquery-2.2.4.min.js"
integrity="sha256-BbhdlvQf/xTY9gja0Dq3HiwQF8LaCRTXxZKRutelT44="
crossorigin="anonymous"></script>
<script src="{{url('public/dashboard/calander/jquery.simple-calendar.js')}}"></script>
<script type="text/javascript" src="{{url('public/dashboard/js/bootstrap-multiselect.js')}}"></script>



</html>





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
<script type="text/javascript">
  $(document).ready(function() {
    $('#mySelect').multiselect();
  });
</script>
@stop
