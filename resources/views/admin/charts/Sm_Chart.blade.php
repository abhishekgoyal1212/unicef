 @extends('admin.dashboard.index')
@section('title','Dashboard')
@section('content')

<style>
  .chartdiv {
    width: 100%;
    height: 350px;
    background-color: white;
  }

  .amchart{
      width: 100%;
    height: 350px;
    background-color: white;
  }
  .amchart2{
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
   </div>
</div>
    </div>
    
  </div>
</div>


</div>

</div>

</div>
</section>


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

@stop
