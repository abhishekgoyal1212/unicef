<div>
    <!-- Waste no more time arguing what a good man should be, be one. - Marcus Aurelius -->
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
           noVal++
           ;         }else{
             flag = "#yesStr"+yesVal; 
             yesVal++;
           }
           var group_data = planing_graph.yes_no_values[i].all_data.districts;
           if (planing_graph.yes_no_values[i].cnt > 1) {
            group_data = group_data+" ("+planing_graph.yes_no_values[i].cnt+")";
          }
          $(flag).html( group_data );
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
       var group_data = coordination_graph.yes_no_values[i].all_data.districts;
       if (coordination_graph.yes_no_values[i].cnt > 1) {
        group_data = group_data+" ("+coordination_graph.yes_no_values[i].cnt+")";
      }
      $(flag).html( group_data );

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
        am5.color(0x145a32),
        am5.color(0xF1948A),
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
        var pvtbodies = JSON.parse(pvtbodies);
        $.each(pvtbodies, function(key, value) {
          var pvtbodies_graph_append = '<h6 class="state-heading state_color'+key+'" >'+value.districts+'</h6><div class="row align-items-center "><div class="col-md-1"><div class="dot_round progress_cricle  left-cricle'+key+'"><i class="fa fa-circle ">'+value.meeting+'</i></div></div> <div class="col-md-10"><div class="progressive_bars"><div class="progress  "> <div class="progress-bar  progress_bg'+key+'" style="width: '+value.percent+'%"></div><div class="progress-bar   progress_text'+key+'">'+value.participants+'</div></div></div></div><div class="col-md-1"><div><i class="fa fa-circle" style="heigh:200px;"></i></div></div></div>'
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

<!-- <script>
  var group_select_value = 13;
$("#group_select_value").on('change', function(){
  var group_select_value = $(this).val();
  group_tracking_graph(group_select_value);
});
function group_tracking_graph(OptionValue){
  var group_select_value = OptionValue;
  var start_date = $("input[name=group_tracking_from_date]").val();
  var end_date = $("input[name=group_tracking_to_date]").val();
  var csrf_token = '{{csrf_token()}}';
  $("#append_group_chart").empty();
  $("#append_group_chart").append('<div class="amchart" id="amchartgroup"></div>');
    $.ajax({
      url : "{{route('groups_tracking_graph')}}",
      type : 'POST',
      data : {
        start_date:start_date,
        end_date: end_date,
        group_select_value : group_select_value,
        _token : csrf_token,
      },
      success:function(data){
       var group_tracking_graph_data = JSON.parse(data);
       am5.ready(function() {
          var root = am5.Root.new("amchartgroup");
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
          var data = group_tracking_graph_data;
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
            categoryField: "user_id",
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
              categoryXField: "user_id"
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
              makeSeries("Nomadic locations", "Nomadic_Locations",am5.color("#290066"));
              makeSeries("Construction Labour sites", "Construction_Labour_Sites",am5.color("#3d0099"));
              makeSeries("Bricklin Labour sites", "Bricklin_Labour_Sites",am5.color("#5200cc"));
              makeSeries("Mine Labour Sites", "Mine_Labour_Sites",am5.color("#6600ff"));
              makeSeries("Excluded Groups Sites", "Excluded_Groups_Sites",am5.color("#751aff"));
              makeSeries("Pastrol Community", "Pastrol_Community",am5.color("#944dff"));
              makeSeries("Slum Dwellers", "Slum_Dwellers",am5.color("#b380ff"));
              makeSeries("Sex Workers", "Sex_Workers",am5.color("#d1b3ff"));
              makeSeries("HRG tracked", "hrg_tracked",am5.color("#e0ccff"));
              chart.appear(1000, 100);
                });  
      }
    });
}
group_tracking_graph(group_select_value);
</script> -->

<script>
 var group_select_value = 13;
 $("#group_select_value").on('change', function(){
  var group_select_value = $(this).val();
  group_tracking_graph(group_select_value);
});
 function group_tracking_graph(OptionValue){
  var group_select_value = OptionValue;
  var start_date = $("input[name=group_tracking_from_date]").val();
  var end_date = $("input[name=group_tracking_to_date]").val();
  var csrf_token = '{{csrf_token()}}';
  $("#append_group_chart").empty();
  $("#append_group_chart").append('<div class="amchart" id="amchartgroup"></div>');
  $.ajax({
    url : "{{route('groups_tracking_graph')}}",
    type : 'POST',
    data : {
      start_date:start_date,
      end_date: end_date,
      group_select_value : group_select_value,
      _token : csrf_token,
    },
    success:function(data){
     var group_tracking_graph_data = JSON.parse(data);
     am5.ready(function() {
      var root = am5.Root.new("amchartgroup");
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
      var data = group_tracking_graph_data;
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
                  // xAxis:renderer.minGridDistance = 20,
                  renderer: am5xy.AxisRendererX.new(root, {
                    cellStartLocation: 0.2,
                    cellEndLocation: 0.8,
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
          tooltipText: "{valueY}",
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

      }
      makeSeries("field", "field",am5.color("#d580ff"));
      chart.appear(1000, 100);
    });  
   }
 });
}
group_tracking_graph(group_select_value);
</script>




<script>
  $(".pg_checkbox_class").on('click', function(){
    performance_graph();
  });
  function performance_graph(){
    var start_date = $("input[name=performance_from_date]").val();
    var end_date = $("input[name=performance_to_date]").val();
    var csrf_token = '{{csrf_token()}}';
    var val = [];
    $(':checkbox:checked').each(function(i){
      val[i] = $(this).val();
    });
    if(val == ''){
      val = ['1', '2', '3'];
    }

    $("#append_performance_graph").empty();
    $("#append_performance_graph").append('<div class="card-body"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div><canvas id="myChart" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas></div>');
    $.ajax({
      url : "{{route('performance_graph')}}",
      type : 'POST',
      data : {
        start_date:start_date,
        end_date: end_date,
        _token : csrf_token,
        checkbox_value:val,
      },
      success:function(data){
        var performance_graph_data = JSON.parse(data);
        var TotalDistricts = performance_graph_data.AllDistrict.map(function (obj) {
          return obj.districts;});
        var PlanningPlatform = Object.keys(performance_graph_data.PPSumDistricts).map(function (key) { return performance_graph_data.PPSumDistricts[key]; });

        var SocailMobilization = Object.keys(performance_graph_data.SMSumDistricts).map(function (key) { return performance_graph_data.SMSumDistricts[key]; });

        var Orientation = Object.keys(performance_graph_data.OrientationSumDistricts).map(function (key) { return performance_graph_data.OrientationSumDistricts[key]; });

        var Pvt_Bodies = Object.keys(performance_graph_data.PvtSumDistricts).map(function (key) { return performance_graph_data.PvtSumDistricts[key]; });

        var Coordination_line = Object.keys(performance_graph_data.CoordinationSumDistricts).map(function (key) { return performance_graph_data.CoordinationSumDistricts[key]; });

        var Mass_Media = Object.keys(performance_graph_data.MassMediaSumDistricts).map(function (key) { return performance_graph_data.MassMediaSumDistricts[key]; });

        var Goround_Level_Health = Object.keys(performance_graph_data.GroundHealthSumDistricts).map(function (key) { return performance_graph_data.GroundHealthSumDistricts[key]; });

        var Group_Traking = Object.keys(performance_graph_data.GroundTrackingSumDistricts).map(function (key) { return performance_graph_data.GroundTrackingSumDistricts[key]; });

        var Iec = Object.keys(performance_graph_data.IecSumDistricts).map(function (key) { return performance_graph_data.IecSumDistricts[key]; });


        var xValues = TotalDistricts;

        new Chart("myChart", {
          type: "line",
          data: {
            labels: xValues,
            datasets: [{
              data: PlanningPlatform,
              borderColor: "#ff6666",
              fill: false
            }, {
              data: SocailMobilization,
              borderColor: "#944dff",
              fill: false
            }, {
              data: Orientation,
              borderColor: "#66ff66",
              fill: false
            }, {
              data: Pvt_Bodies,
              borderColor: "#db4dff",
              fill: false
            }, {
              data: Coordination_line,
              borderColor: "#808080",
              fill: false
            }, {
              data: Mass_Media,
              borderColor: "#00ffff",
              fill: false
            }, {
              data: Goround_Level_Health,
              borderColor: "#ffbf00",
              fill: false
            }, {
              data: Group_Traking,
              borderColor: "#ff751a",
              fill: false
            }, {
              data: Iec,
              borderColor: "#4d79ff",
              fill: false
            }]
          },
          options: {
            legend: {
              display: false
            },
            scales: {
              yAxes: [{
                ticks: {
                  min: 0,
                  callback: function(value, index, values) {
                    if (Math.floor(value) === value) {
                      return value;
                    }
                  }
                }
              }]
            }
          }
        });

      }
    });
  }

  performance_graph();
</script>

<script type="text/javascript">
  $(".dropdown dt a").on('click', function () {
          $(".dropdown dd ul").slideToggle('fast');
      });

  jQuery(document).click((event) => {
  if (!jQuery(event.target).closest('#element').length) {
    // the click occured outside '#element'
      jQuery("#picker").fadeOut();
  }        
});
</script>
<script>
  $(".sum_checkbox_value").on('click', function(){
    var month_value = [];
    var csrf_token = '{{csrf_token()}}';
    $(':checkbox:checked').each(function(i){
      month_value[i] = $(this).val();
    });
       $.ajax({
      url : "{{route('monthwise_sum')}}",
      type: 'POST',
      data: {
        months_value : month_value,
        _token : csrf_token,
      },
      success:function(data){
        var sum_data = JSON.parse(data);
        $("#SmSum").empty();
        $("#SmSum").append(sum_data.SmSum);
        $("#MassMediaSum").empty();
        $("#MassMediaSum").append(sum_data.MassMediaSum);
        $("#PvtSum").empty();
        $("#PvtSum").append(sum_data.PvtSum);
      }
    });
  });
</script>
<script>
      
</script>
<script>
 var iec_district_id = 13;
 $("#iec_district_id").on('change', function(){
  var iec_district_id = $(this).val();
  iec_graph(iec_district_id);
});
 function iec_graph(OptionValue){
  var iec_district_id = OptionValue;
  var iec_table_name = $('#iec_table_name').val();
  var start_date = $("input[name=iec_from_date]").val();
  var end_date = $("input[name=iec_to_date]").val();
  var csrf_token = '{{csrf_token()}}';
  $("#append_iec_chart").empty();
  $("#append_iec_chart").append('<div class="chartdiv" id="chartdiviec"></div>');
  $.ajax({
    url : "{{route('iec_graph')}}",
    type : 'POST',
    data : {
      start_date:start_date,
      end_date: end_date,
      iec_district_id : iec_district_id,
      iec_table_name : iec_table_name,
      _token : csrf_token,
    },
    success:function(data){
     var iec_graph_data = JSON.parse(data);
     am5.ready(function() {
      var root = am5.Root.new("chartdiviec");
      root.setThemes([am5themes_Animated.new(root)]);
      var chart = root.container.children.push(
        am5percent.SlicedChart.new(root, {
          layout: root.verticalLayout
        })
      );
      var series = chart.series.push(
        am5percent.FunnelSeries.new(root, {
          alignLabels: false,
          orientation: "vertical",
          valueField: "value",
          categoryField: "category",
          legendLabelText: "{category}",
          legendValueText: "{value}"
        })
      );
      series.slices.template.setAll({
        strokeOpacity: 0,
        fillGradient: am5.LinearGradient.new(root, {
          rotation: 0,
          stops: [{ brighten: -0.4 }, { brighten: 0.4 }, { brighten: -0.4 }]
        })
      });
      series.data.setAll(iec_graph_data);
      series.appear();
      var legend = chart.children.push(
        am5.Legend.new(root, {
          centerX: am5.p50,
          x: am5.p50,
          marginTop: 15,
          marginBottom: 15
        })
      );
      legend.data.setAll(series.dataItems);
      chart.appear(1000, 100);
      });  
   }
 });
}
iec_graph(iec_district_id);
</script>
