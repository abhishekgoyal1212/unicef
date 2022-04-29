@extends('admin/dashboard/index')
@section('content')
<div class="col-sm-9">
  <br><br><br>
<div class="row">
    <div class="col-md-6 px-0">
      <h3 class="tab-head">Select Chart</h3>
      <select id="chart_change" class="w-100 bg-transparent mt-3 py-3 px-2 category">
          <option value=""> Select Chart</option>
          <option value="1">Number of Meeting</option>
          <option value="2">Meeting with Faith Based Institutions /Religious Leaders</option>
          <option value="3">Meeting with Influencers</option>
          <option value="4">Mother Meetings</option>
          <option value="5">Meeting with excluded groups (PWD, Transgender)</option>
      </select>
    </div>              
</div>
 <div class="row my-4" id="number_meetings" style="display: none;">
        <div class="col-md-8 pr-lg-8">
          <h4 class="mb-4">Number Meeting</h4>
          <div id="amchart"></div>
    </div>
 </div>
    
 <div class="row my-4" id="meeting_with_influencers" style="display: none;">
        <div class="col-md-8 pr-lg-8">
          <h4 class="mb-4">Meeting With Influencers</h4>
          <div id="myChartMeetingWithInfluencers"></div>
    </div>
 </div>

 <div class="row my-4" id="mother_meetings" style="display: none;">
        <div class="col-md-8 pr-lg-8">
          <h4 class="mb-4"> Mother Meetings</h4>
          <div id="myChartMotherMeetings"></div>
    </div>
 </div>

 <div class="row my-4" id="meeting_with_faith_based_institutions" style="display: none;">
        <div class="col-md-8 pr-lg-8">
          <h4 class="mb-4">Meeting With Faith Based Institutions</h4>
          <div id="myChartMeetingWithFaithBasedInstitutions"></div>
    </div>
 </div>

 <div class="row my-4" id="meeting_with_excluded_groups" style="display: none;">
        <div class="col-md-8 pr-lg-8">
          <h4 class="mb-4">Meeting With Excluded Groups</h4>
          <div id="myChartMeetingWithExcludedGroups"></div>
    </div>
 </div>

</div>

<script>
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
        var data = [{"year": "Dholpur", "europe": 10960, "namerica": 8839, "asia": 19799,}, {"year": "Baran", "europe": 4455, "namerica": 3308, "asia": 7763,}, {"year": "Sirohi", "europe": 4713, "namerica": 8627, "asia": 13340,}, {"year": "Jaisalmer","europe": 4496, "namerica": 3435, "asia": 7991, }, {"year": "Karauli","europe": 2174,"namerica": 1568,"asia": 3742,}, { "year": "Dungarpur", "europe":1678, "namerica": 1834, "asia": 3512,}];
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
          categoryField: "year",
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
            categoryXField: "year"
            ,fill:color,
          }));
                  
          series.columns.template.setAll({
            tooltipText: "{name}, {categoryX}:{valueY}",
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
        makeSeries("Men Participated", "europe",am5.color("#6d1ed1"));
        makeSeries(" Women Participated", "namerica",am5.color("#f96fab"));
        makeSeries("Total Participated", "asia",am5.color("#ac42c0"));
        chart.appear(1000, 100);
        });
</script>

<script>
  $('#chart_change').on('change', function() {
  var chart_value =  this.value;
  if(chart_value == 1){
    $('#number_meetings').show();
    $('#meeting_with_faith_based_institutions').hide();
    $('#meeting_with_influencers').hide();
    $('#mother_meetings').hide();
    $('#meeting_with_excluded_groups').hide();
  }
  if(chart_value == 2){
    $('#meeting_with_faith_based_institutions').show();
    $('#number_meetings').hide();
    $('#meeting_with_influencers').hide();
    $('#mother_meetings').hide();
    $('#meeting_with_excluded_groups').hide();
  }
  if(chart_value == 3){
    $('#meeting_with_influencers').show();
    $('#number_meetings').hide();
    $('#meeting_with_faith_based_institutions').hide();
    $('#mother_meetings').hide();
    $('#meeting_with_excluded_groups').hide();
  }

  if(chart_value == 4){
    $('#mother_meetings').show();
    $('#number_meetings').hide();
    $('#meeting_with_faith_based_institutions').hide();
    $('#meeting_with_influencers').hide();
    $('#meeting_with_excluded_groups').hide();

  }
   if(chart_value == 5){
    $('#meeting_with_excluded_groups').show();
    $('#mother_meetings').hide();
    $('#number_meetings').hide();
    $('#meeting_with_faith_based_institutions').hide();
    $('#meeting_with_influencers').hide();
  }
mother_meetings


});
 </script>

@stop