 @extends('admin.dashboard.index')
@section('title','Dashboard')
@section('content')

<style>
  .chartdiv {
    width: 100%;
    height: 350px;
    background-color: white;
  }

  #append_div {
    width: 100%;
    height: 350px;
    background-color: white;
  }
  .select-sec-box h5 {
    padding-top: 0px;
    font-size: 16px;
    font-weight: 400;
  }
  .pp_append_div {
    width: 100%;
    
    background-color: white;
  }
  .custom-date-sec{
    padding-top: 2px
  }

  .custom-date-sec input{
   padding: 22px 10px !important;
   background: #f7f2ef !important;
   margin-top: 4px !important

 }
 .custom-date-sec-s input{
   background: #f7f2ef !important;

 }
 .select-sec-box select{
  padding: 10px;
  width: 95%;
} 
.select-sec-box.topic button{
  border: 1px solid #cecece;
  height: 40px;
  width: 100px;
  margin-top: 40px;
  font-size: 16px;
  color: #000000;
}
select#yes_no_in_district {
  width: 85%;
}
ul#list_group li {
  list-style: none;
  font-size: 14px;
  padding: 5px;
  color: #000
}
ul#list_group li:first-child{
  padding-top: 0px
}
.District-List h6{
  font-size: 23px;
  color: #000;
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
                <img src="{{asset('public/dashboard/img/aravali.png') }}" class="img-fluid" alt="">
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
              <div class="deshboard-img-sec" >
                  <a href="#"> <img class="rounded-circle" src="{{asset('public/users-image/'. auth()->user()->profile)}}" alt="" width="100" height="100" id="showmenu"></a>
              </div>
              <div class="deshboard-conteant-sec"  style="display: none;">
                  <div class="arrow"></div>
                <img class="rounded-circle" src="{{asset('public/users-image/'. auth()->user()->profile)}}" alt="">
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
                </div>
              </div>
          </div>
        </div>

     <div class="row my-4">
      <div class="col-md-12 pr-lg-4">
        <center><h4 class="mb-4">Social Mobilization</h4></center>

        <div class="row" id="error_data_append">
             <div class="col-3">
              <div class="custom-date-sec-s">
                <lable>From Date</lable>
                <input type="text" name="from_date_field" class="start_date" value="2022-04-01">
              </div>
            </div>
            <div class="col-3">
              <div class="custom-date-sec-s">
                <lable>To Date</lable>
                <input type="text" name="to_date_field" class="end_date" value="2022-04-15">
              </div>
            </div>
            <div class="col-6">
              <lable>Chart Type</lable>
              <div class="select-sec-box">
               <select id="chart_id">
                 <!-- <option >Social Mobilization</option> -->
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
     <center><h4 class="m-5">Planing Platform</h4></center>
   </div>
   <div class="col-3">
    <div class="custom-date-sec">
      <lable>From Date</lable>
      <input type="text" name="from_date" class="start_date" value="2022-04-01">
    </div>
  </div>
  <div class="col-3">
    <div class="custom-date-sec">
      <lable>To Date</lable>
      <input type="text" name="to_date" class="start_date" value="2022-04-15">
    </div>
  </div>

  <div class="select-sec-box col-md-4">
    <h5>Select Planing Platform Table</h5>
    <select class="select_value" id="select_value">
     <option value="1">DTF/DHS Meeting</option>
     <option value="2">Nigrani Samiti meeting</option>
     <option value="3">District Communication plan availability</option>
     <option value="4">Fortnightly Implementation Report of DCP</option>
   </select>
 </div>
 <div class="col-md-4" >
   <div class="select-sec-box for-show-hide" id="show-1">
     <h5>Planing Platform Columns</h5>
     <select class="planning_chart" id="pp_select_value_id1">
       <!-- <option value="" class="select" hidden>Select Column</option> -->
       <option value="1" class="select">Wheather Meeting Held</option>
       <option value="2" class="select">Whether SBCC Consultant participated</option>
       <option value="3" class="select">Suggestions provided by SBCC Consultant</option>
     </select>
   </div>
   <div class="select-sec-box for-show-hide" id="show-2" style="display: none;">
     <h5>Planing Platform Columns</h5>
     <select class="planning_chart" id="pp_select_value_id2">
       <option value="" class="select" hidden>Select Column</option>
       <option value="4" class="select">Wheather Meeting Held</option>
       <option value="5" class="select">Whether SBCC Consultant participated</option>
     </select>
   </div>
   <div class="select-sec-box for-show-hide" id="show-3" style="display: none;">
     <h5>Planing Platform Columns</h5>
     <select class="planning_chart" id="pp_select_value_id3">
       <option value="0" class="select" hidden>Select Column</option>
       <option value="6" class="select">Wheather DCP Developed</option>
     </select>
   </div>
   <div class="select-sec-box for-show-hide" id="show-4" style="display: none;">
     <h5>Planing Platform Columns</h5>
     <select class="planning_chart" id="pp_select_value_id4">
       <option value="0" class="select" hidden>Select Column</option>
       <option value="7" class="select">1st Fortnighly Report sent by District</option>
       <option value="8" class="select">2nd Fortnighly Report sent by District</option>
     </select>
   </div>


 </div>
 <div class="col-md-3">
  <div class="select-sec-box topic">
   <h5 class="pt-2">Select Topic</h5>
   <select class="planning_chart w-100">
     <option value="0" >Topic1</option>
     <option value="7" >Topic2</option>
     <option value="8" >Topic3</option>
   </select>
 </div>
</div>

</div>

<div class="row">
  <div class="col-md-8 pl-lg-6">
   <h4 class="mb-4">Planing Platform</h4>
   <div id="append_chartdiv" style="background-color:white;"></div>
   
   {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}"  width="100%" alt="">--}}
 </div>
 <div class="col-md-4 pl-lg-6">
   <div class="col-md-12 pp_append_div" style="background-color:transparent;">
    <div class="select-sec-box District-List" id="yes_no_div_show" style="display: none;">
      <h6 class="mb-4">District List</h6>
<!--               <select class="select_value" id="yes_no_in_district">
                 <option value="1">Yes</option>
                 <option value="0">No</option>
               </select> -->
               <table class="table table-hover table-bordered table-striped el-table">
                <tr>
                  <th>Yes</th>
                  <th>No</th>
                </tr>
                <tbody id="yes_no_table_district">

                </tbody>
              </table>
              <style>
                .list-group {
                  display: flex;
                }

              </style>

              <ul class="list-group" id="list_group">
                <li>

                </li>
              </ul>
            </div>
          </div>
        </div>

      </div>

    </div>
   <div class="row mt-4">
        <div class="col-3" >
            <lable>From Date</lable>
            <input type="text" name="coordination_from_date" class="start_date" value="2022-04-01">
        </div>
        <div class="col-3">
            <lable>To Date</lable>
          <input type="text" name="coordination_to_date" class="start_date" value="2022-04-15">
        </div>
              <div class="select-sec-box col-md-4">
              <h5>Select Coordination Meeting Line Table</h5>
                  <select class="select_value" id="coordination_select_value">
                    <option value="1">Panchayti Raj/Rural Development</option>
                    <option value="2">ICDS</option>
                    <option value="3">Education</option>
                    <option value="4">SRLM</option>
                    <option value="5">Tribal Area Development Dept</option>
                    <option value="6">DMWO</option>
                  </select>
              </div>
      </div>
<div class="row">
    <div class="col-md-8 pl-lg-4">
      <br>
       <center><h4 class="mb-4">Coordination Meeting Line</h4></center>
      <div id="append_coordination_chard_div" style="background-color:white;"></div>
    </div>


    <div class="col-md-4 pl-lg-4">
      <br>
      <h6 class="mb-4">District List</h6>
<!--               <select class="select_value" id="yes_no_in_district">
                 <option value="1">Yes</option>
                 <option value="0">No</option>
               </select> -->
               <table class="table table-hover table-bordered table-striped el-table">
                <tr>
                  <th>Yes</th>
                  <th>No</th>
                </tr>
                <tbody id="yes_no_table_district_coordination">

                </tbody>
              </table>
              <style>
                .list-group {
                  display: flex;
                }

              </style>
    </div>
  </div>

    <div class="row mt-4">
        <div class="col-3" >
            <lable>From Date</lable>
            <input type="text" name="pvtbodies_from_date" class="start_date" value="2022-04-01">
        </div>
        <div class="col-3">
            <lable>To Date</lable>
          <input type="text" name="pvtbodies_to_date" class="start_date" value="2022-04-15">
        </div>
              <div class="select-sec-box col-md-4">
                <h5>Select Coordination Meeting Line Table</h5>
                  <select class="select_value" id="pvtbodies_select_value">
                    <option value="pvt_ima_iap_meeting">Meeting with IMA/IAP</option>
                    <option value="private_practitionerst_meeting">Meeting with Private practitioners</option>
                    <option value="pvt_pharmacists_associations_meeting">Pharmacists Associations</option>
                    <option value="pvt_merchant_associations_meeting">Merchant Association</option>
                    <option value="pvt_others_meeting">Others</option>
                  </select>
              </div>
      </div>

    <div class="row mt-4">
        <div class="col-md-5 pr-lg-4 ">
           <h4 class="mb-4">Pvt Bodies</h4>
           <div class="bg-white p-4" id="append_pvt_bodies_graph"> </div>
        </div>
        <div class="col-md-5 pr-lg-3">
           <h4 class="mb-4">Pvt Bodies</h4>
           <div class="bg-white p-4" id="append_pvt_bodies_graph2"> </div>
        </div>
    </div>

    <div class="col-md-6 pl-lg-4">
      <h4 class="mb-4">Mass Media</h4>
      <div id="amchart2"></div>
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

            <canvas id="myChart" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<script>
  $(document).ready(function () {
    $(".start_date").datepicker({
      onSelect: function() {
        $(this).change();
      },
      dateFormat: "yy-mm-dd",
      maxDate: 0,
      onSelect: function () {
        var dt2 = $('.end_date');
        var startDate = $(this).datepicker('getDate');
        startDate.setDate(startDate.getDate() + 30);
        var minDate = $(this).datepicker('getDate');
        var dt2Date = dt2.datepicker('getDate');
        var dateDiff = (dt2Date - minDate)/(86400 * 1000);
        if (dt2Date == null || dateDiff < 0) {
          dt2.datepicker('setDate', minDate);
        }
        else if (dateDiff > 30){
          dt2.datepicker('setDate', startDate);
        }
        dt2.datepicker('option', 'minDate', minDate);
      }
    });
    $('.end_date').datepicker({
      dateFormat: "yy-mm-dd",
      maxDate : "0",
    });
  });
</script>


<script>
  var chartvaluenumber = 1 ;
  $('#chart_id').on('change', function(){
    chartvaluenumber = $(this).val();
    default_data(chartvaluenumber);
  });
  function default_data(Idvalue){
    var chartvalueresult = Idvalue;
    var from_date_field_value = $("input[name=from_date_field]").val();
    var to_date_field_value = $("input[name=to_date_field]").val();
    var csrf_token  = '{{csrf_token()}}';
    $("#append_div").empty();
    $("#append_div").append('<div id="amchart"></div>');
    $("#error_data").remove();
    $.ajax({
      url: "{{route('fetch_graph_data')}}",
      type:'POST',                                                            
      data: {
        _token:csrf_token,from_date:from_date_field_value, to_date:to_date_field_value, chartvalueresult: chartvalueresult},
        success: function(dataquery){
          if(dataquery == 'error')
          {
            $("#error_data_append").after('<div class="row" id="error_data"><div class="col-12"><div class="alert alert-danger">Data Not Found</div></div></div>')
          }else{
           var dataresult = JSON.parse(dataquery);
         }

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
}
default_data(chartvaluenumber);
</script>

<script>
 $('#select_value').click(function(event) {
  $(".for-show-hide").hide();
  $("#show-"+$(this).val()).show();
});
</script>

<script type="text/javascript">
  var chartvaluenumber = 1;
  $('.planning_chart').on('change', function() {
    chartvaluenumber = $(this).val();
    create_chart_flow(chartvaluenumber);
  }); 
  function create_chart_flow(IdValue){
    $("#yes_no_table_district").html("");
    $("#yes_no_div_show").hide();
    $("#append_chartdiv").empty();
    $("#append_chartdiv").append('<div class="chartdiv" id="chartdiv1"></div>');
    var planingchartvalue = IdValue;
    var date = $("input[name=from_date]").val();
    var to_date = $("input[name=to_date]").val();
    var csrf_token = '{{csrf_token()}}';
    $.ajax({
      url: "{{route('planning_graph')}}",
      type: 'POST',
      data: {
          date:date,
          todate:to_date,
        _token:csrf_token,
        planingchartvalue:planingchartvalue
      },
      success:function(data){
        // console.log(data);
        var planing_graph = JSON.parse(data);
        yesVal = 0;
        noVal = 0;
        var forLoop = (planing_graph.No < planing_graph.Yes) ? planing_graph.Yes : planing_graph.No;
        for (var i = 0; i < planing_graph.yes_no_values.length; i++) {
          var tabstr = `
          <tr id="forrow${i}">
          <td id="noStr${i}" class="tdy"></td>
          <td id="yesStr${i}" class="tdn"></td>
          </tr>`;
          $("#yes_no_table_district").append(tabstr);
          var flag = "";
          if(planing_graph.yes_no_values[i].condition){
           flag = "#noStr"+noVal;
           noVal++;
         }else{
           flag = "#yesStr"+yesVal; 
           yesVal++;
         }
         $(flag).html(planing_graph.yes_no_values[i].all_data.districts);
       }
       for (var i = 0; i < $("#yes_no_table_district tr").length; i++) {
        if($("#forrow"+i+" #noStr"+i).html() == "" && $("#forrow"+i+" #yesStr"+i).html() == ""){
          $("#forrow"+i).hide();
        }
      }
      am5.ready(function() {
        var root = am5.Root.new("chartdiv1");
        root.setThemes([
          am5themes_Animated.new(root)
          ]);
        var chart = root.container.children.push(am5percent.PieChart.new(root, {
          radius: am5.percent(90),
          innerRadius: am5.percent(50),
          layout: root.horizontalLayout
        }));
        var series = chart.series.push(am5percent.PieSeries.new(root, {
          name: "Series",
          valueField: "numberofmiting",
          categoryField: "meeting",
          legendLabelText: "{category}",
          legendValueText: "{value}",
        }));
        series.get("colors").set("colors", [
          am5.color(0x90f5ad),
          am5.color(0xed5585),
          ]);
        $("#yes_no_div_show").show(); 
        series.data.setAll([{
          color: "chocolate",
          meeting:"Yes",
          numberofmiting:parseInt(planing_graph.Yes)
        },{
          meeting:"No",
          numberofmiting:parseInt(planing_graph.No) 
        }]);
        series.labels.template.set("visible", false);
        series.ticks.template.set("visible", false);
        series.slices.template.set("strokeOpacity", 0);
        series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
          stops: [{
            brighten: -0.8
          }, {
            brighten: -0.8
          }, {
            brighten: -0.5
          }, {
            brighten: 0
          }, {
            brighten: -0.5
          }]
        }));

        var legend = chart.children.push(am5.Legend.new(root, {
          centerY: am5.percent(50),
          y: am5.percent(50),
          marginTop: 15,
          marginBottom: 15,
          marginRight: 80,
          layout: root.verticalLayout
        }));
        legend.data.setAll(series.dataItems);
        series.appear(1000, 100);
      });
    }
  });
  }
  create_chart_flow(chartvaluenumber);
</script>

<script>
  var coordination_select_value = 1;
  $('#coordination_select_value').on('change', function(){
    var coordination_select_value = $(this).val();
    coordination_chart(coordination_select_value);
  });

  function coordination_chart(IdValue){
    $("#yes_no_table_district_coordination").html("");
    var from_date = $("input[name=coordination_from_date]").val();
    var to_date = $("input[name=coordination_to_date]").val();
    var coordination_select_value = IdValue;
    var csrf_token = '{{csrf_token()}}';
    $("#append_coordination_chard_div").empty();
    $("#append_coordination_chard_div").append('<div class="chartdiv" id="chartdiv2"></div>');
    $.ajax({
         url: "{{route('coordination_graph')}}",
          type: 'POST',
          data: {
              date:from_date,
              todate:to_date,
            _token:csrf_token,
            coordinationvalue:coordination_select_value
          },
            success:function(data){
            var coordination_graph = JSON.parse(data);
              yesVal = 0;
              noVal = 0;
              var forLoop = (coordination_graph.No < coordination_graph.Yes) ? coordination_graph.Yes : coordination_graph.No;
              for (var i = 0; i < coordination_graph.yes_no_values.length; i++) {
                var tabstr = `
                <tr id="forrowc${i}">
                <td id="noStrc${i}" class="tdy"></td>
                <td id="yesStrc${i}" class="tdn"></td>
                </tr>`;
                $("#yes_no_table_district_coordination").append(tabstr);
                var flag = "";
                if(coordination_graph.yes_no_values[i].condition){
                 flag = "#noStrc"+noVal;
                 noVal++;
               }else{
                 flag = "#yesStrc"+yesVal; 
                 yesVal++;
               }
               $(flag).html(coordination_graph.yes_no_values[i].all_data.districts);
             }
             for (var i = 0; i < $("#yes_no_table_district_coordination tr").length; i++) {
              if($("#forrowc"+i+" #noStrc"+i).html() == "" && $("#forrowc"+i+" #yesStrc"+i).html() == ""){
                $("#forrowc"+i).hide();
              }
            }
           

              am5.ready(function() {
                var root = am5.Root.new("chartdiv2");
                root.setThemes([
                  am5themes_Animated.new(root)
                  ]);
                var chart = root.container.children.push(am5percent.PieChart.new(root, {
                  radius: am5.percent(90),
                  innerRadius: am5.percent(50),
                  layout: root.horizontalLayout
                }));
                var series = chart.series.push(am5percent.PieSeries.new(root, {
                  name: "Series",
                  valueField: "numberofmiting",
                  categoryField: "meeting",
                  legendLabelText: "{category}",
                  legendValueText: "{value}",
                }));
                series.get("colors").set("colors", [
                  am5.color(0xffff00),
                  am5.color(0x0000ff),
                  ]);
                $("#yes_no_div_show").show(); 
                series.data.setAll([{
                  color: "chocolate",
                  meeting:"Yes",
                  numberofmiting:parseInt(coordination_graph.Yes)
                },{
                  meeting:"No",
                  numberofmiting:parseInt(coordination_graph.No) 
                }]);
                series.labels.template.set("visible", false);
                series.ticks.template.set("visible", false);
                series.slices.template.set("strokeOpacity", 0);
                series.slices.template.set("fillGradient", am5.RadialGradient.new(root, {
                  stops: [{
                    brighten: -0.8
                  }, {
                    brighten: -0.8
                  }, {
                    brighten: -0.5
                  }, {
                    brighten: 0
                  }, {
                    brighten: -0.5
                  }]
                }));

                var legend = chart.children.push(am5.Legend.new(root, {
                  centerY: am5.percent(50),
                  y: am5.percent(50),
                  marginTop: 15,
                  marginBottom: 15,
                  marginRight: 80,
                  layout: root.verticalLayout
                }));
                legend.data.setAll(series.dataItems);
                series.appear(1000, 100);
              });
            }
      });
  }
coordination_chart(coordination_select_value);
  
</script>
<script>
  var pvtbodies_select_value = 'pvt_ima_iap_meeting';
  $('#pvtbodies_select_value').on('change', function(){
    var pvtbodies_select_value = $(this).val();
    pvtbodies_chart(pvtbodies_select_value)
  });
  function pvtbodies_chart(IdValue){
    $('#append_pvt_bodies_graph').html('');
    $('#append_pvt_bodies_graph2').html('');
    var start_date = $('input[name=pvtbodies_from_date]').val();
    var end_date = $('input[name=pvtbodies_to_date]').val();
    var pvtbodies_select_value = IdValue;
    var csrf_token = '{{csrf_token()}}';
    $.ajax({
        url : "{{route('pvt_bodies_graph')}}",
        type : 'POST',
        data: {
          start_date:start_date,
          end_date : end_date,
          _token:csrf_token,
          pvtbodiesvalue:pvtbodies_select_value
        },
          success:function(pvtbodies){
              console.log(pvtbodies);
            var pvtbodies = JSON.parse(pvtbodies);
            $.each(pvtbodies, function(key, value) {
               var pvtbodies_graph_append = '<h6 class="state-heading">'+value.districts+'</h6><div class="row align-items-center "><div class="col-md-1"><div class="dot_round progress_cricle  left-cricle  "><i class="fa fa-circle">'+value.meeting+'</i></div></div> <div class="col-md-10"><div class="progressive_bars"><div class="progress  "> <div class="progress-bar progress_bg'+key+'" style="width: '+value.percent+'%"></div><div class="progress-bar  progress_text'+key+'">'+value.participants+'</div></div></div></div><div class="col-md-1"><div class="dot_round progress_cricle right-cricle "><i class="fa fa-circle" style="heigh:200px;"></i></div></div></div>'
              if(key <= 7){
                $('#append_pvt_bodies_graph').append(pvtbodies_graph_append);
              }else if(key > 7){
                $('#append_pvt_bodies_graph2').append(pvtbodies_graph_append);
              }
            });
          }
    });
  }
  pvtbodies_chart(pvtbodies_select_value);
</script>
@stop

