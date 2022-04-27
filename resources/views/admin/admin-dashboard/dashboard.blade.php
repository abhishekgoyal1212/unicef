@extends('admin.admin-dashboard.index')
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



    <link rel="stylesheet" href="{{ asset('public/template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- summernote -->
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    <!-- DATATABLE -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('public/template/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">

    <!-- SELECT 2 -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('public/template/plugins/select2/css/select2.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('public/template/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }} ">

    <!-- TOASTR -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/toastr/toastr.min.css') }} ">

    <!-- EDITOR -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/summernote/summernote-bs4.css') }} ">
    <link rel="stylesheet" href="{{ asset('public/template/plugins/summernote/summernote-bs4.css') }}">

    <link rel="stylesheet" href="{{ asset('public/admin-assets/css/style.css') }}">
    <script src="{{ asset('public/template/plugins/jquery/jquery.min.js') }}"></script>


    <!-- npm Charts -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chartjs-plugin-datalabels"></script>


    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="//cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <!-- Resources -->
    <script src="https://cdn.amcharts.com/lib/4/core.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/charts.js"></script>
    <script src="https://cdn.amcharts.com/lib/4/themes/animated.js"></script>




    <script src="https://cdn.anychart.com/releases/v8/js/anychart-base.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-ui.min.js"></script>
    <script src="https://cdn.anychart.com/releases/v8/js/anychart-exports.min.js"></script>

    <script src="https://cdn.anychart.com/releases/v8/js/anychart-circular-gauge.min.js"></script>


    <link href="https://cdn.anychart.com/releases/v8/css/anychart-ui.min.css" type="text/css" rel="stylesheet">
    <link href="https://cdn.anychart.com/releases/v8/fonts/css/anychart-font.min.css" type="text/css" rel="stylesheet">


</head>
<body>


  <div class="col-sm-9">
      <div class="row">
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box one py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-bag mr-2"></i> <span>DCP & IEC Status</span></p>
              <h3 class="my-2">47</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>
            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box two py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-stats-bars  mr-2"></i><span>Review Meeting</span></p>
              <h3 class="my-2">488</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box three py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-person-add  mr-2"></i><span>Social Mobilization</span></p>
              <h3 class="my-2">864</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>


            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box four py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-pie-graph  mr-2"></i><span>Line Department</span></p>
              <h3 class="my-2">244</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>

        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box five py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-stats-bars  mr-2"></i><span>Mid Media</span></p>
              <h3 class="my-2">47</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box six py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-person-add  mr-2"></i><span>Stakeholders</span></p>
              <h3 class="my-2">3728</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box seven py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-pie-graph  mr-2"></i><span>Vaccination Status</span></p>
              <h3 class="my-2">65</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box eight py-3">
            <div class="inner">
              <p class="mb-0"> <i class="ion ion-bag  mr-2"></i><span>Media Activity</span></p>
              <h3 class="my-2">150</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box nine py-3">
            <div class="inner">
              <p class="mb-0"> <i class="ion ion-stats-bars  mr-2"></i><span>FLWs Trained</span></p>
              <h3 class="my-2">53<sup style="font-size: 20px">%</sup></h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box ten py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-person-add  mr-2"></i><span>IEC Material</span></p>
              <h3 class="my-2">44</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>

          </div>
        </div>
        <!-- ./col -->
        <div class="col-lg-3 col-xl-2 col-md-6 col-12 my-3">
          <!-- small box -->
          <div class="small-box eleven py-3">
            <div class="inner">
              <p class="mb-0"><i class="ion ion-pie-graph  mr-2"></i><span>High Risk</span></p>
              <h3 class="my-2">65</h3>
              <p class="mb-0"><i class="fa fa-caret-down mr-2"></i> <span>3% from last week</span></p>

            </div>
          </div>
        </div>
      </div>



      <div class="row bar-graph">
        <!-- Left col -->
        <section class="col-lg-12 connectedSortable">
          <!-- Custom tabs (Charts with tabs)-->
          <div class="card mt-5">
            <div class="card-header">
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
            <div class="card-body">
              <!-- <div id="chartdiv"></div> -->
              <canvas id="myChart"></canvas>
            </div>
        </section>

        <div class="row card-chart">

          <section class="col-lg-10 col-xl-6 mt-4 pr-xl-4">
            <div class="card my-progress crd-chart">
              <div class="card-header">
                <h5 class="card-title plateform">Platform</h5>


              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <div class="row">
                  <!-- /.col -->
                  <div class="col-md-12">
                    <!-- <p class="text-center">
                    <strong>Goal Completion</strong>
                  </p> -->

                    <div class="progress-group">
                      <span class="progress-text">Review Meeting</span>
                      <!-- <span class="float-right"><b>160</b>/200</span> -->
                      <div class="progress progress-lg">
                        <div class="progress-bar bg-success" style="width: 25%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->

                    <div class="progress-group">
                      <span class="progress-text">Social Mobilization</span>
                      <!-- <span class="float-right"><b>310</b>/400</span> -->
                      <div class="progress progress-lg">
                        <div class="progress-bar bg-success" style="width: 15%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Private Body & Line Department Coordination</span>
                      <!-- <span class="float-right"><b>480</b>/800</span> -->
                      <div class="progress progress-lg">
                        <div class="progress-bar bg-success" style="width:10%"></div>
                      </div>
                    </div>

                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Mass Media & Mild Media Activity</span>

                      <!-- <span class="float-right"><b>250</b>/500</span> -->
                      <div class="progress progress-lg">
                        <div class="progress-bar bg-success" style="width: 15%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->


                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">FLWs Stakeholders Trained</span>

                      <!-- <span class="float-right"><b>250</b>/500</span> -->
                      <div class="progress progress-lg">
                        <div class="progress-bar bg-success" style="width: 5%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->


                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">DCP & IEC Status</span>

                      <!-- <span class="float-right"><b>250</b>/500</span> -->
                      <div class="progress progress-lg">
                        <div class="progress-bar bg-success" style="width: 15%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->


                    <!-- /.progress-group -->
                    <div class="progress-group">
                      <span class="progress-text">Vaccination Status</span>

                      <!-- <span class="float-right"><b>250</b>/500</span> -->
                      <div class="progress progress-lg">
                        <div class="progress-bar bg-success" style="width: 15%"></div>
                      </div>
                    </div>
                    <!-- /.progress-group -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
              <!-- ./card-body -->
              <!-- /.card-footer -->
            </div>
            <!-- /.card -->
          </section>

          <section class="col-lg-10 col-xl-6 mt-4 pl-xl-4">
            <div class="card pl-2 crd-chart">
              <div class="card-header">
                <h3 class="card-title plateform">Platform</h3>

              </div>
              <div class="card-body">
                <div class="chartjs-size-monitor">
                  <div class="chartjs-size-monitor-expand">
                    <div class=""></div>
                  </div>
                  <div class="chartjs-size-monitor-shrink">
                    <div class=""></div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-6">
                    <p class="mb-5">Top 7</p>
                    <canvas id="donutChart" style="min-height: 250px; height: 0px; max-height: 250px; 
                    max-width: 100%; display: block; width: 0px;" width="0" height="0" class="chartjs-render-monitor"></canvas>
                  </div>
                  <div class="col-md-6">
                    <p class="mb-5">Activity</p>
                    <ul class="pl-0 mb-0 list-unstyled chart-graph pr-5 pr-xl-2">
                      <li class="d-flex my-4 pl-5 align-items-center justify-content-between"><span>Review</span><span>25%</span></li>
                      <li class="d-flex my-4 pl-5 align-items-center justify-content-between"><span>Social</span> <span>15%</span></li>
                      <li class="d-flex my-4 pl-5 align-items-center justify-content-between"><span>Private</span> <span>10%</span></li>
                      <li class="d-flex my-4 pl-5 align-items-center justify-content-between"><span>Mass </span> <span>15%</span></li>
                      <li class="d-flex my-4 pl-5 align-items-center justify-content-between"><span>FLWs </span> <span>5%</span></li>
                      <li class="d-flex my-4 pl-5 align-items-center justify-content-between"><span>DCP </span> <span>15%</span></li>
                      <li class="d-flex my-4 pl-5 align-items-center justify-content-between"><span>Vaccination</span> <span>15%</span></li>
                    </ul>
                  </div>
                </div>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </section>



          <!-- <section class="col-md-10 col-xl-6 mt-4 pr-xl-4">
          <div class="card card-widget crd-chart">
            <div class="card-header">
              <h5 class="d-inline-block py-3">Latest Review</h5>
            </div>
            <div class="card-body card-comments bg-transparent">
              <div class="card-comment">
                <img class="img-circle img-sm" src="{{asset('public/template/dist/img/user3-128x128.jpg')}}" alt="User Image">
                <div class="comment-text">
                  <span class="username">
                    Maria Gonzales
                    <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
              </div>
              <div class="card-comment">
                <img class="img-circle img-sm" src="{{asset('public/template/dist/img/user4-128x128.jpg')}}" alt="User Image">
                <div class="comment-text">
                  <span class="username">
                    Luna Stark
                    <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
              </div>
              <div class="card-comment">
                <img class="img-circle img-sm" src="{{asset('public/template/dist/img/user3-128x128.jpg')}}" alt="User Image">
                <div class="comment-text">
                  <span class="username">
                    Maria Gonzales
                    <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
              </div>
              <div class="card-comment">
                <img class="img-circle img-sm" src="{{asset('public/template/dist/img/user4-128x128.jpg')}}" alt="User Image">
                <div class="comment-text">
                  <span class="username">
                    Luna Stark
                    <span class="text-muted float-right">8:03 PM Today</span>
                  </span>
                  It is a long established fact that a reader will be distracted
                  by the readable content of a page when looking at its layout.
                </div>
              </div>
            </div>
          </div>
        </section> -->


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

<!-- jQuery -->
<script type="text/javascript">
    var base_url = "<?php echo url('') . '/'; ?>"
    var csrf_token = "{{csrf_token()}}"
</script>


<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('public/template/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<script src="{{ asset('public/template/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/moment/moment.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}">
</script>
<script src="{{ asset('public/template/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<script src="{{ asset('public/template/dist/js/adminlte.js') }}"></script>
<script src="{{ asset('public/template/dist/js/demo.js') }}"></script>

<script src="{{ asset('public/template/plugins/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/datatables/jquery.dataTables.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/toastr/toastr.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/summernote/summernote-bs4.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/select2/js/select2.full.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('public/template/plugins/jquery-validation/additional-methods.min.js') }}"></script>

<script src="{{ asset('public/template/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>


<script src="{{ asset('public/admin-assets/js/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('public/admin-assets/js/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('public/admin-assets/js/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
<script src="{{ asset('public/admin-assets/js/chart.js/Chart.min.js') }}"></script>
<!-- Sparkline -->
<script src="{{ asset('public/admin-assets/js/sparklines/sparkline.js') }}"></script>
<!-- JQVMap -->
<script src="{{ asset('public/admin-assets/js/jqvmap/jquery.vmap.min.js') }}"></script>
<script src="{{ asset('public/admin-assets/js/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
<!-- jQuery Knob Chart -->
<script src="{{ asset('public/admin-assets/js/jquery-knob/jquery.knob.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('public/admin-assets/js/daterangepicker/daterangepicker.js') }}"></script>

<script src="{{ asset('public/admin-assets/js/moment/moment.min.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('public/admin-assets/js/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('public/admin-assets/js/summernote/summernote-bs4.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('public/admin-assets/js/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('public/admin-assets/js/adminlte.js') }}"></script>
<!-- AdminLTE for demo purposes -->
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->

<script src="{{ asset('public/admin-assets/js/dashboard.js') }}"></script>

<!-- FLOT CHARTS -->
<script src="{{ asset('public/template/plugins/flot/jquery.flot.js') }}"></script>
<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
<script src="asset('public/template/plugins/flot-old/jquery.flot.resize.min.js') }}"></script>
<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
<script src="asset('public/template/plugins/flot-old/jquery.flot.pie.min.js') }}"></script>
<!-- Async script executes immediately and must be after any DOM elements used in callback. -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBeYLC2mWmd58Iek4Vy1hkZBJVUcLIrqmU&callback=initMap&v=weekly" async></script> -->
<script src="{{ asset('public/admin-assets/js/adminjs.js') }}"></script>



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



    /*
     * LINE CHART
     * ----------
     */
    //LINE randomly generated data

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
@stop
