<?php
$segments = request()->segments();
$last = end($segments);
$second = count($segments) > 2 ? $segments[count($segments) - 2] : '';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>@yield('title')</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('public/template/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('public/template/dist/css/adminlte.min.css') }} ">
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

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        <!-- Navbar -->
        <nav class="main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item" id="myHamburger">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
                </li>
                <li class="nav-item d-none d-sm-inline-block">
                    <a href="{{url('bjp-site-admin/dashboard')}}" class="nav-link">Home</a>
                </li>

            </ul>

            <!-- SEARCH FORM -->
            <form class="form-inline ml-3">
                @csrf
            </form>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">

                <li class="nav-item dropdown user-menu">
                    <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
                        <img src="{{ asset('public/template/dist/img/user2-160x160.jpg') }}" class="user-image img-circle elevation-2" alt="User Image">
                        <span class="d-none d-md-inline">Admin</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                        <!-- User image -->
                        <li class="user-header bg-primary">
                            <img src="{{ asset('public/template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">

                            <p>
                                Admin
                                <small>Member since
                                    date</small>
                            </p>
                        </li>

                        <!-- Menu Footer-->
                        <li class="user-footer">
                            <a href="#" class="btn btn-default btn-flat">Profile</a>
                            <a href="{{ url('bjp-site-admin/logout') }}" class="btn btn-default btn-flat float-right">Sign out</a>
                        </li>
                    </ul>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->

        <!-- Main Sidebar Container -->
        <aside class="main-sidebar shadow-none elevation-4">
            <!-- Brand Logo -->


            <!-- Sidebar -->
            <div class="sidebar">
                <!-- Sidebar user panel (optional) -->
                <div class="user-panel mt-3 pb-3 mb-3 d-flex align-items-center">
                    <div class="image">
                        <img src="{{ asset('public/template/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
                    </div>
                    <div class="info ml-3">
                        <a href="#" class="d-block">Admin</a>
                    </div>
                </div>

                @if (session('flash-error'))
                <p class="admin-toastr" onclick="toastr_danger('{{ session('flash-error') }}')"></p>
                @endif
                @if (session('flash-success'))
                <p class="admin-toastr" onclick="toastr_success('{{ session('flash-success') }}')"></p>
                @endif

                <!-- Sidebar Menu -->
                <!-- /.sidebar-menu -->
            </div>
            <!-- /.sidebar -->
        </aside>
        <div class="content-wrapper">

            @yield('content')
        </div>

        <!-- /.content-wrapper -->
        <footer class="main-footer">
            <strong>Copyright &copy; 2021 <a href="<?= url('/admin') ?>">SBCC Fact Sheet</a>.</strong>
            All rights reserved.
        </footer>

        <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->
</body>

</html>
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