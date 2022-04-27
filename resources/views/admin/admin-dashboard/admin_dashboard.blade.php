@extends('admin/admin-dashboard/index')

@section('title','DASHBOARD')

@section('content')
<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700&display=swap" rel="stylesheet">
<style>
  * {
    font-family: 'Poppins', sans-serif;
  }

  #chartdiv {
    width: 100%;
    height: 500px;
  }
</style>
<!-- <div class="content-wrapper"> -->
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0 text-dark">Dashboard</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dashboard v1</li>
          </ol>
        </div>
      </div>
    </div>
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Small boxes (Stat box) -->
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
      </div>
    </div>
  </section>
<!-- </div> -->


@stop

<!-- jQuery -->