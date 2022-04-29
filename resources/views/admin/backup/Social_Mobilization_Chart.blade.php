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

  <div class="row bar-graph" id="number_meetings" style="display: none;">
  <div class="col-lg-12 px-0">
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="row deshoard-gaap">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Number Meeting
              </h3>
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
            <canvas id="myChartNumberMeeting" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>

<div class="row bar-graph" id="meeting_with_influencers" style="display: none;">
  <div class="col-lg-12 px-0">
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="row deshoard-gaap">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
              Meeting With Influencers
              </h3>
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
            <canvas id="myChartMeetingWithInfluencers" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>


<div class="row bar-graph" id="mother_meetings" style="display: none;">
  <div class="col-lg-12 px-0">
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="row deshoard-gaap">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Mother Meetings
              </h3>
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
            <canvas id="myChartMotherMeetings" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>


<div class="row bar-graph" id="meeting_with_faith_based_institutions" style="display: none;">
  <div class="col-lg-12 px-0">
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="row deshoard-gaap">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
               Meeting With Faith Based Institutions
              </h3>
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
            <canvas id="myChartMeetingWithFaithBasedInstitutions" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>


  <div class="row bar-graph" id="meeting_with_excluded_groups" style="display: none;">
  <div class="col-lg-12 px-0">
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="row deshoard-gaap">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
               Meeting With Excluded Groups
              </h3>
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
            <canvas id="myChartMeeting WithExcludedGroups" width="1006" height="503" style="display: block; width: 1006px; height: 503px;" class="chartjs-render-monitor"></canvas>
          </div>
        </div>
      </div>
    </section>
  </div>
</div>
</div>

<script>
    //LINE randomly generated data

    var xValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    // var yValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    var yLabels = {
    0 : 'Jan-1st', 2 : 'Jan-2nd',4 : 'Feb-1st', 6 : 'Feb-2nd', 8 : 'Mar-1st',
    10 : 'Mar-2nd', 12 : 'Apr-1st', 14 : 'Apr-2nd', 16 : 'May-1st',
    18 : 'May-2nd', 20 : 'Jun-1st'
}
    new Chart("myChartNumberMeeting", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                // data: ['Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara'],
                data: [0,1,14,8,6,10,0],
                borderColor: "#ffe7db",
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
                callback: function(value, index, values) {
                    // for a value (tick) equals to 8
                    return yLabels[value];
                    // 'junior-dev' will be returned instead and displayed on your chart
                }
            }
        }]
    }
        }
    });
</script>
<script>
    //LINE randomly generated data

    var xValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    // var yValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    var yLabels = {
    0 : 'Jan-1st', 2 : 'Jan-2nd',4 : 'Feb-1st', 6 : 'Feb-2nd', 8 : 'Mar-1st',
    10 : 'Mar-2nd', 12 : 'Apr-1st', 14 : 'Apr-2nd', 16 : 'May-1st',
    18 : 'May-2nd', 20 : 'Jun-1st'
}
    new Chart("myChartMeetingWithFaithBasedInstitutions", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                // data: ['Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara'],
                data: [0,1,14,8,6,10,0],
                borderColor: "#ffe7db",
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
                callback: function(value, index, values) {
                    // for a value (tick) equals to 8
                    return yLabels[value];
                    // 'junior-dev' will be returned instead and displayed on your chart
                }
            }
        }]
    }
        }
    });
</script>
<script>
    //LINE randomly generated data

    var xValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    // var yValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    var yLabels = {
    0 : 'Jan-1st', 2 : 'Jan-2nd',4 : 'Feb-1st', 6 : 'Feb-2nd', 8 : 'Mar-1st',
    10 : 'Mar-2nd', 12 : 'Apr-1st', 14 : 'Apr-2nd', 16 : 'May-1st',
    18 : 'May-2nd', 20 : 'Jun-1st'
}
    new Chart("myChartMeetingWithInfluencers", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                // data: ['Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara'],
                data: [0,1,14,8,6,10,0],
                borderColor: "#ffe7db",
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
                callback: function(value, index, values) {
                    // for a value (tick) equals to 8
                    return yLabels[value];
                    // 'junior-dev' will be returned instead and displayed on your chart
                }
            }
        }]
    }
        }
    });
</script>
<script>
    //LINE randomly generated data

    var xValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    // var yValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    var yLabels = {
    0 : 'Jan-1st', 2 : 'Jan-2nd',4 : 'Feb-1st', 6 : 'Feb-2nd', 8 : 'Mar-1st',
    10 : 'Mar-2nd', 12 : 'Apr-1st', 14 : 'Apr-2nd', 16 : 'May-1st',
    18 : 'May-2nd', 20 : 'Jun-1st'
}
    new Chart("myChartNumberMeeting", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                // data: ['Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara'],
                data: [0,1,14,8,6,10,0],
                borderColor: "#ffe7db",
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
                callback: function(value, index, values) {
                    // for a value (tick) equals to 8
                    return yLabels[value];
                    // 'junior-dev' will be returned instead and displayed on your chart
                }
            }
        }]
    }
        }
    });
</script>
<script>
    //LINE randomly generated data

    var xValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    // var yValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    var yLabels = {
    0 : 'Jan-1st', 2 : 'Jan-2nd',4 : 'Feb-1st', 6 : 'Feb-2nd', 8 : 'Mar-1st',
    10 : 'Mar-2nd', 12 : 'Apr-1st', 14 : 'Apr-2nd', 16 : 'May-1st',
    18 : 'May-2nd', 20 : 'Jun-1st'
}
    new Chart("myChartMotherMeetings", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                // data: ['Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara'],
                data: [0,1,14,8,6,10,0],
                borderColor: "#ffe7db",
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
                callback: function(value, index, values) {
                    // for a value (tick) equals to 8
                    return yLabels[value];
                    // 'junior-dev' will be returned instead and displayed on your chart
                }
            }
        }]
    }
        }
    });
</script>
<script>
    //LINE randomly generated data

    var xValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    // var yValues = [0, 'Banswara', 'Chittaurgarh', 'Churu', 'Hanumangarh', 'Jalore', 'Jhalawar', 'Tonk'];
    var yLabels = {
    0 : 'Jan-1st', 2 : 'Jan-2nd',4 : 'Feb-1st', 6 : 'Feb-2nd', 8 : 'Mar-1st',
    10 : 'Mar-2nd', 12 : 'Apr-1st', 14 : 'Apr-2nd', 16 : 'May-1st',
    18 : 'May-2nd', 20 : 'Jun-1st'
}
    new Chart("myChartMeeting WithExcludedGroups", {
        type: "line",
        data: {
            labels: xValues,
            datasets: [{
                // data: ['Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara', 'Banswara'],
                data: [0,1,14,8,6,10,0],
                borderColor: "#ffe7db",
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
                callback: function(value, index, values) {
                    // for a value (tick) equals to 8
                    return yLabels[value];
                    // 'junior-dev' will be returned instead and displayed on your chart
                }
            }
        }]
    }
        }
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