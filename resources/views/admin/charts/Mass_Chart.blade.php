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
     <div class="row my-4">
      <div class="col-md-12 pr-lg-4">
         <div class="row mt-4">
                    <div class="col-3" >
                        <lable>From Date</lable>
                        <input type="text" name="mass_media_from_date" class="start_date" value="2022-04-01">
                    </div>
                    <div class="col-3">
                        <lable>To Date</lable>
                      <input type="text" name="mass_media_to_date" class="start_date" value="2022-04-15">
                    </div>
                    <div class="select-sec-box col-md-4">
                      <h5>Select District</h5>
                        <select class="select_value" id="mass_select_value">
                          @foreach($districts as $value)
                          <option value="{{$value->id}}">{{$value->districts}}</option>
                          @endforeach
                        </select>
                    </div>
            </div>

           <div class="row mt-0">
              <div class="col-md-11 pl-lg-4">
                <h4 class="mt-4">Mass Media</h4>
                <div id="appendamchart2">
                </div>
                {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
              </div> 
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


<script type="text/javascript">
var mass_media_value = 13;
$('#mass_select_value').on('change', function (){
  var mass_media_value = this.value;
  mass_media_graph(mass_media_value);
});

function mass_media_graph(OptionValue){
  var start_date =$("input[name=mass_media_from_date]").val();
  var end_date = $("input[name=mass_media_to_date]").val();
  var mass_media_value = OptionValue;
  var csrf_token = '{{csrf_token()}}';
  $("#appendamchart2").empty();
 $("#appendamchart2").append('<div class="amchart2" id="amchartmass"></div>');
  $.ajax({
    url: "{{route('mass_media_graph')}}",
    type : 'POST',
    data :{
        start_date:start_date,
        end_date : end_date,
        _token:csrf_token,
        mass_media_value:mass_media_value
      },
      success:function(data){
        if(data == 'error')
          {
            $("#error_data_append").after('<div class="row" id="error_data"><div class="col-12"><div class="alert alert-danger">Data Not Found</div></div></div>')
          }else{
           var mass_graph_data = JSON.parse(data);
         }
                am5.ready(function() {
                var root = am5.Root.new("amchartmass");
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
                  // legend.align = "right",
                  am5.Legend.new(root, {
                    width: am5.percent(100),
                    x: am5.percent(50),
                    marginTop:10,
                    layout: root.horizontalLayout
                  })
                );
                var data = mass_graph_data;
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
                  categoryField: "type",
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
                    categoryXField: "type",
                    fill:color,
                  }));
                
                  series.columns.template.setAll({
                    tooltipText: "{name}:{valueY}",
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
                makeSeries("Male", "male",am5.color("#ffc107"));
                makeSeries("Female", "female",am5.color("#f96fab"));
                chart.appear(1000, 100);
                }); 
      }
  });
}
mass_media_graph(mass_media_value);
</script>

@stop
