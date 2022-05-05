@extends('admin.dashboard.index')
@section('title','Dashboard')
@section('content')
<style>
  #append_div {
    width: 100%;
    height: 350px;
    background-color: white;
}
  </style>
 
<div class="col-sm-9">
  <div class='row'>
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
             <!--  <a href="{{route('admin.logout')}}" class="logout"><span>Sign Out</span></a> -->
                <div class="deshboard-img-sec" >
                  <a href="#"> <img class="rounded-circle" src="{{asset('public/user-assets/img/users-image/'. auth()->user()->profile)}}" alt="" width="100" height="100" id="showmenu"></a>
                </div>
                <div class="deshboard-conteant-sec"  style="display: none;">
                  <div class="arrow"></div>
                 <img class="rounded-circle" src="{{asset('public/user-assets/img/users-image/'. auth()->user()->profile)}}" alt="">
                    <span>Admin</span>


                    <div class="deshboard-conteant-btn">
                      <a href="{{route('profile')}}"><button class="mr-2">Profile</button></a>
                      <a href="{{route('admin.logout')}}"><button class="ml-2">Sign out</button></a>
                    </div>
                </div>



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
        <div class="col-md-12 pr-lg-4">
         <!--  <h4 class="mb-4">Social Mobilization</h4> -->

        <div class="row">
           <div class="col-3">
              <lable>From </lable>
              <input type="text" name="from_date_field" id="start_date">
            </div>
            <div class="col-3">
              <lable>To </lable>
              <input type="text" name="to_date_field" id="end_date">
            </div>
            <div class="col-6">
                  <lable>Chart Type</lable>
                  <div class="select-sec-box">
                   <select id="chart_id">
                     <option >Social Mobilization</option>
                       <option value="1">Meeting with Faith Based Institutions /Religious Leaders</option>
                       <option value="2"> Meeting with Influencers </option>
                       <option value="3">Number of Meeting with</option>
                       <option value="4">IPC</option>
                       <option value="5">Mother Meetings</option>
                       <option value="6">Community Meetings</option>
                       <option value="7">Meeting with SHG Members</option>
                       <option value="8">Meeting with Vulrenable Groups Sites</option>
                       <option value="9">Meeting with excluded groups(PWD,Transgender)</option>
                       <option value="10">Meeting with the volunteer organization</option>
                   </select>
                  </div>
            </div>
           
        </div>

          <div id="append_div" style="background-color:white;">
        
          </div>
         
          {{--<img src="{{asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
        </div>
        <div class="col-md-6 pl-lg-4">
          <h4 class="mb-4">Mass Media</h4>
          <div id="amchart2"></div>
          {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
        </div>
      </div>
      <div class="row my-4">
        <div class="col-md-6 pr-lg-4 ">
         <h4 class="mb-4">Pvt Bodies</h4>
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
                  <div class="progress-bar progress_bg5" style="width:40%">Dholpur</div>
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
       <h4 class="mb-4">Orientation</h4>
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
<div class="row bar-graph">
  <div class="col-lg-3"></div>
  <div class="col-lg-9 px-0">
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="row deshoard-gaap">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <!-- <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Line Chart
              </h3> -->
              <ul class="pl-0 mb-0 graph-head list-unstyled d-flex align-items-center flex-row flex-wrap">
                <li class="d-inline-block mx-4">review</li>
                <li class="d-inline-block mx-4">social</li>
                <li class="d-inline-block mx-4">private</li>
                <li class="d-inline-block mx-4">mass </li>
                <li class="d-inline-block mx-4">FLWs </li>
                <li class="d-inline-block mx-4">DCP </li>
                <li class="d-inline-block mx-4">vaccination</li>
              </ul>
            </div>
            <div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
            <!-- <div id="chartdiv"></div> -->
            <canvas id="myChart" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
<script>
  $( function() {
  $( "#start_date" ).datepicker({
    dateFormat: "yy-mm-dd"
    , duration: "fast"
  });
});
  $( function() {
  $( "#end_date" ).datepicker({
    dateFormat: "yy-mm-dd"
    , duration: "fast"
  });
});
  </script>
<script>
   $('#chart_id').on('change', function(){
    var chartvalueresult = this.value;
      var from_date_field_value = $("input[name=from_date_field]").val();
     var to_date_field_value = $("input[name=to_date_field]").val();
     var csrf_token  = '{{csrf_token()}}';
     $("#append_div").empty();
     $("#append_div").append('<div id="amchart"></div>');
     $.ajax({
            url: "{{route('fetch_graph_data')}}",
            type:'POST',                                                            
            data: {
              _token:csrf_token,from_date:from_date_field_value, to_date:to_date_field_value, chartvalueresult: chartvalueresult},
            success: function(dataquery){
               var dataresult = JSON.parse(dataquery);
               am5.ready(function() {
                var root = am5.Root.new("amchart");
                root.setThemes([
                  am5themes_Animated.new(root)
                ]);
                var chart = root.container.children.push(am5xy.XYChart.new(root, {
                  panX: false,
                  panY: false,
                  wheelX: "panX",
                  wheelY: "zoomX",
                  layout: root.verticalLayout
                }));
                
                var legend = chart.children.push(
                  am5.Legend.new(root, {
                    width: am5.percent(100),
                    centerX: am5.percent(50),
                    x: am5.percent(50),
                    marginTop:10,
                  })
                );
              var data = dataresult;

                root.numberFormatter.setAll({
                  numberFormat: "#a",
                  bigNumberPrefixes: [
                    { "number": 1e+3, "suffix": "K" },
                    { "number": 1e+6, "suffix": "M" },
                    { "number": 1e+9, "suffix": "B" }
                  ],
                
                  smallNumberPrefixes: []
                });
               
                var xAxis = chart.xAxes.push(am5xy.CategoryAxis.new(root, {
                  categoryField: "districts",
                  // xAxis:renderer.minGridDistance = 20,
                  renderer: am5xy.AxisRendererX.new(root, {
                    cellStartLocation: 0.1,
                    cellEndLocation: 0.9,
                    minGridDistance :20,
                  }),
                  tooltip: am5.Tooltip.new(root, {})
                }));
                
                xAxis.data.setAll(data);
                
                var yAxis = chart.yAxes.push(am5xy.ValueAxis.new(root, {
                  
                  renderer: am5xy.AxisRendererY.new(root, {})
                }));
                
                function makeSeries(name, fieldName, color) {
                  var series = chart.series.push(am5xy.ColumnSeries.new(root, {
                    name: name,
                    xAxis: xAxis,
                    yAxis: yAxis,
                    valueYField: fieldName,
                    categoryXField: "districts"
                    ,fill:color,
                  }));
                  
                
                  series.columns.template.setAll({
                    tooltipText: "{name}={valueY}",
                    width: am5.percent(90),
                    tooltipY: 0
                  });
                
                  series.data.setAll(data);
                
                  series.appear();
                
                  series.bullets.push(function () {
                    return am5.Bullet.new(root, {
                      locationY: 0,
                      sprite: am5.Label.new(root, {
                        text: "{valueY}",
                        fill: root.interfaceColors.get("alternativeText"),
                        centerY: 0,
                        centerX: am5.p50,
                        populateText: true
                      })
                    });
                  });
                
                  legend.data.push(series);
                }
                
        if(chartvalueresult == 1){
          makeSeries("Number of Meetings", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of Male", "male",am5.color("#f96fab"));
          makeSeries("Number of Female", "female",am5.color("#007bff"));
        }
        if(chartvalueresult == 2){
          makeSeries("Number of Meetings", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of Male", "male",am5.color("#f96fab"));
          makeSeries("Number of Female", "female",am5.color("#007bff"));
        }
        if (chartvalueresult == 3){
          makeSeries("Number of Meetings with Lions Club", "lions_club",am5.color("#6d1ed1"));
          makeSeries("Number of Meetings with Rotary", "rotary_club",am5.color("#f96fab"));
          makeSeries("Number of Meetings with local CSOs/Others", "locals",am5.color("#007bff"));
        }
         if (chartvalueresult == 4){
          makeSeries("Number of IPC", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of family visited(male)", "male",am5.color("#f96fab"));
          makeSeries("Number of family visited(Female)", "female",am5.color("#007bff"));
        }
        if(chartvalueresult == 5){
          makeSeries("Number of Meetings", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of Participants(Male)", "male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "female",am5.color("#007bff"));
        }
        if(chartvalueresult == 6){
          makeSeries("Number of Meetings", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of Participants(Male)", "male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "female",am5.color("#007bff"));
        }
        if(chartvalueresult == 7){
         makeSeries("Number of Meetings", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of Participants(Male)", "male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "female",am5.color("#007bff"));
        }
        if(chartvalueresult == 8){
          makeSeries("Number of Meetings", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of Participants(Male)", "male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "female",am5.color("#007bff"));
        }
        if(chartvalueresult == 9){
          makeSeries("Number of Meetings", "meeting",am5.color("#6d1ed1"));
          makeSeries("Number of Participants(Male)", "male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "female",am5.color("#007bff"));
        }
        if(chartvalueresult == 10){
          makeSeries("Number of meeting with NYKS", "nyks_number_meetings",am5.color("#6d1ed1"));
          makeSeries("Number of Participants(Male)", "nyks_participants_male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "nyks_participants_female",am5.color("#007bff"));
          makeSeries("Number of meeting with NSS", "nss_number_meetings",am5.color("#ccff66"));
          makeSeries("Number of Participants(Male)", "nss_participants_male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "nss_participants_female",am5.color("#007bff"));
          makeSeries("Number of meeting with Bharat Scout Guide", "bsg_number_meetings",am5.color("#ff3300"));
          makeSeries("Number of Participants(Male)", "bsg_participants_male",am5.color("#f96fab"));
          makeSeries("Number of Participants(Female)", "bsg_participants_female",am5.color("#007bff"));
        }
                chart.appear(1000, 100);
                }); 

            }
          });
    

  });

</script>

@stop
