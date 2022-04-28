@extends('admin.dashboard.index')
@section('title','Dashboard')
@section('content')
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
                  <a href="#"><img src="{{asset('public/user-assets/img/userimg.png')}}" alt="" id="showmenu"></a>
                </div>
                <div class="deshboard-conteant-sec"  style="display: none;">
                  <div class="arrow"></div>
                  <img src="{{asset('public/user-assets/img/userimg.png')}}" alt="">
                    <span>Admin</span>


                    <div class="deshboard-conteant-btn">
                      <a href="#"><button class="mr-2">Profile</button></a>
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
        <div class="col-md-6 pr-lg-4">
          <h4 class="mb-4">Communication Activities</h4>
          <div id="amchart"></div>
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
@stop
