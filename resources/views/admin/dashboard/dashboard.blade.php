 @extends('admin.dashboard.index')
 @section('title','Dashboard')
 @section('content')
<div class="col-sm-9">
  <div class='row'>
    <div class="tab-content">
      <div id="Covid" class="tab-pane fade show active">
        <div class="row mb-5 dashboard-right-section">
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
                <dl class="dropdown" id="element">
                  <dt>
                    <a href="javascript:void(0)" class="d-flex align-items-center justify-content-between">
                      <span class="hida">Select Month</span>    
                      <!-- <p class="multiSel"></p>  --> 
                     <img src="https://img.icons8.com/material-rounded/18/000000/sort-down.png"/>
                    </a>
                  </dt>
                  <dd>
                    <div class="mutliSelect">
                      <ul id="picker">
                        @if($current_Month >=1)
                        <li><input type="checkbox" class="sum_checkbox_value" class="sum_checkbox_value" value="1"/>January</li>
                        @endif
                        @if($current_Month >= 2)
                        <li><input type="checkbox" class="sum_checkbox_value" value="2" />February</li> 
                        @endif
                        @if($current_Month >= 3)
                        <li><input type="checkbox" class="sum_checkbox_value" value="3"/>March</li> 
                        @endif
                        @if($current_Month >= 4)
                        <li><input type="checkbox" class="sum_checkbox_value" value="4" />April</li> 
                        @endif
                        @if($current_Month >= 5)
                        <li><input type="checkbox" class="sum_checkbox_value" value="5" />May</li> 
                        @endif
                        @if($current_Month >= 6)
                        <li><input type="checkbox" class="sum_checkbox_value" value="6" />June</li> 
                        @endif
                        @if($current_Month >= 7)
                        <li><input type="checkbox" class="sum_checkbox_value" value="7" />July</li> 
                        @endif
                        @if($current_Month >= 8)
                        <li><input type="checkbox" class="sum_checkbox_value" value="8" />August</li> 
                        @endif
                        @if($current_Month >= 9)
                        <li><input type="checkbox" class="sum_checkbox_value" value="9" />September</li> 
                        @endif
                        @if($current_Month >= 10)
                        <li><input type="checkbox" class="sum_checkbox_value" value="10" />October</li> 
                        @endif
                        @if($current_Month >= 11)
                        <li><input type="checkbox" class="sum_checkbox_value" value="11" />November</li> 
                        @endif
                        @if($current_Month >= 12)
                        <li><input type="checkbox" class="sum_checkbox_value" value="12" />December</li> 
                        @endif
                       </ul>
                     </div>
                    </dd>
                </dl>
              </div>
              <div class="col-xl-3 col-lg-6 my-lg-2">
                <div class="report-box report-number bg-white text-center">
                  <p class="mb-0">Social Mobilization</p>
                  <a href="{{route('admin.smchart')}}"><h4 class="mb-0" id="SmSum">{{$SmSum}}</h4></a>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 my-lg-2">
                <div class="report-box report-number bg-white text-center">
                  <p class="mb-0">Mass Media Activity</p>
                  <a href="{{route('admin.masschart')}}"><h4 class="mb-0" id="MassMediaSum">{{$MassMediaSum}}</h4></a>
                </div>
              </div>
              <div class="col-xl-3 col-lg-6 my-lg-2">
                <div class="report-box report-number bg-white text-center">
                  <p class="mb-0">Pvt Bodies Activity</p>
                  <a href="{{route('admin.pvtchart')}}"><h4 class="mb-0" id="PvtSum">{{$PvtSum}}</h4></a>
                </div>
              </div>
            </div>
          </div>
          <div class="col-md-4 pl-3 pl-xl-5">
            <div class="deshboard-img-sec" >
              <a href="javascript:void(0)"> <img class="rounded-circle" src="{{asset('public/users-image/'. auth()->user()->profile)}}" alt="" width="100" height="100" id="showmenu"></a>
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

       <div class="row my-4  dashboard-right-section">
        <div class="col-md-12 pr-lg-4">
         <h4 class="mb-4">Social Mobilization</h4>

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
       <!--   <h4 class="my-5">Planing Platform</h4> -->
     </div>

     <div class="col-lg-12">
       <h4 class="mt-5 mb-3 planning_platform-extra">Planing Platform</h4>

     </div>
     <div class="col-4 my-2 ">
      <div class="custom-date-sec extra-custome">
        <lable>From Date</lable>
        <input type="text" name="from_date" class="start_date" value="2022-04-01">
      </div>
    </div>
    <div class="col-3 my-2">
      <div class="custom-date-sec">
        <lable>To Date</lable>
        <input type="text" name="to_date" class="start_date" value="2022-04-15">
      </div>
    </div>

    <div class="select-sec-box col-md-4 ">
      <h5 class="pt-2">Select Planing Platform Table</h5>
      <select class="select_value" id="select_value">
       <option value="1">DTF/DHS Meeting</option>
       <option value="2">Nigrani Samiti meeting</option>
       <option value="3">District Communication plan availability</option>
       <option value="4">Fortnightly Implementation Report of DCP</option>
     </select>
   </div>
   <div class="col-md-4 my-2" >
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
   <div class="col-md-3 my-2">
    <div class="select-sec-box topic">
     <h5 class="">Select Topic</h5>
     <select class=" w-100">
       <option value="0" >Topic1</option>
       <option value="7" >Topic2</option>
       <option value="8" >Topic3</option>
     </select>
   </div>
 </div>
 <div class="col-md-8 pl-lg-6">
   <div id="append_chartdiv" style="background-color:white;"></div>
   {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}"  width="100%" alt="">--}}
 </div>
 <div class="col-md-4 pl-lg-6">
   <div class="col-md-12 pp_append_div" style="background-color:transparent;">
    <div class="select-sec-box District-List" id="yes_no_div_show" style="display: none;">
      <h6 class="mb-4">District List</h6>
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
    <div class="row  dashboard-right-section">
      <div class="col-lg-12">
       <h4 class="mb-4">Coordination Meeting Line</h4>
     </div>

     <div class="col-3" >
      <lable class="lable">From Date</lable>
      <input type="text" name="coordination_from_date" class="start_date" value="2022-04-01">
    </div>
    <div class="col-3">
      <lable class="lable">To Date</lable>
      <input type="text" name="coordination_to_date" class="start_date" value="2022-04-15">
    </div>
    <div class="select-sec-box col-md-6">
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
    <div class="col-md-8">
      <br>
      <div id="append_coordination_chard_div" style="background-color:white;"></div>
    </div>
    <div class="col-md-4 pl-lg-4">
      <br>
      <h6 class="mb-4">District List</h6>
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
          <div class="row mt-4  dashboard-right-section">
            <div class="col-lg-12">
             <h4 class="mb-4">Pvt Bodies</h4>
           </div>
           <div class="col-lg-3" >
            <lable class="lable">From Date</lable>
            <input type="text" name="pvtbodies_from_date" class="start_date" value="2022-04-01">
          </div>
          <div class="col-lg-3">
            <lable class="lable">To Date</lable>
            <input type="text" name="pvtbodies_to_date" class="start_date" value="2022-04-15">
          </div>
          <div class="select-sec-box col-md-6">
            <h5>Select Pvt Bodies Table</h5>
            <select class="select_value" id="pvtbodies_select_value">
              <option value="pvt_ima_iap_meeting">Meeting with IMA/IAP</option>
              <option value="private_practitionerst_meeting">Meeting with Private practitioners</option>
              <option value="pvt_pharmacists_associations_meeting">Pharmacists Associations</option>
              <option value="pvt_merchant_associations_meeting">Merchant Association</option>
              <option value="pvt_others_meeting">Others</option>
            </select>
          </div>
          <div class="col-md-6 pr-lg-4 ">
           <div class="bg-white p-4" id="append_pvt_bodies_graph"> </div>
         </div>
         <div class="col-md-6 pr-lg-3">
           <div class="bg-white p-4" id="append_pvt_bodies_graph2"> </div>
         </div>
       </div>
       <div class="row  dashboard-right-section">
        <div class="col-lg-12">
          <h4 class="my-4 ">Mass Media</h4>

          <div class="row mt-4">
            <div class="col-3" >
              <lable>From Date</lable>
              <input type="text" name="mass_media_from_date" class="start_date" value="2022-02-01">
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
          <div id="appendamchart2">
          </div>
    </div>
  </div>
  <div class="row mt-0 dashboard-right-section">
    <div class="col-md-12 ">
      <h4 class="my-4">Group Tracking</h4>
      <div class="row mt-4">
        <div class="col-3" >
          <lable>From Date</lable>
          <input type="text" name="group_tracking_from_date" class="start_date" value="2022-02-01">
        </div>
        <div class="col-3">
          <lable>To Date</lable>
          <input type="text" name="group_tracking_to_date" class="start_date" value="2022-04-15">
        </div>
        <div class="select-sec-box col-md-4">
          <h5>Select District</h5>
          <select class="select_value" id="group_select_value">
            @foreach($districts as $value)
            <option value="{{$value->id}}">{{$value->districts}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div id="append_group_chart">
      </div>
    </div> 
  </div>
  <div class="row mt-0 dashboard-right-section">
    <div class="col-md-12 ">
      <h4 class="my-4">IEC</h4>
      <div class="row mt-4">
        <div class="col-2" >
          <lable>From Date</lable>
          <input type="text" name="iec_from_date" class="start_date" value="2022-04-01">
        </div>
        <div class="col-2">
          <lable>To Date</lable>
          <input type="text" name="iec_to_date" class="start_date" value="2022-04-15">
        </div>
        <div class="select-sec-box col-md-5">
          <h5>Select IEC Sub Category</h5>
          <select class="select_value" id="iec_table_name">
              <option value="1">IEC material/Prototyoe Received from State</option>
              <option value="2">Local IEC Material Developed and Disseminated</option>
              <option value="3">Special IEC for Pregnant Women and Adolescent</option>
          </select>
        </div>
        <div class="select-sec-box col-md-3">
          <h5>Select District</h5>
          <select class="select_value" id="iec_district_id">
            @foreach($districts as $value)
            <option value="{{$value->id}}">{{$value->districts}}</option>
            @endforeach
          </select>
        </div>
      </div>
      <div id="append_iec_chart"></div>
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
    <h4 class="mt-4">District Wise Performance</h4>

    <div class="row mt-4">
      <div class="col-3" >
        <lable>From Date</lable>
        <input type="text" name="performance_from_date" class="start_date" value="2022-04-01">
      </div>
      <div class="col-3">
        <lable>To Date</lable>
        <input type="text" name="performance_to_date" class="start_date" value="2022-04-15">
      </div>
    </div>
    <section class="col-lg-12 connectedSortable ui-sortable">
      <div class="row deshoard-gaap">
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <ul class="pl-0 mb-0 graph-head list-unstyled d-flex align-items-center flex-row flex-wrap">
                <input type="checkbox" name="pg_checkbox[]" value="1" class="pg_checkbox_class"><li class="d-inline-block mx-4">Planing Platform</li>
                <input type="checkbox" name="pg_checkbox[]" value="2" class="pg_checkbox_class"><li class="d-inline-block mx-4">Social Mobilization</li>
                <input type="checkbox" name="pg_checkbox[]" value="3" class="pg_checkbox_class"><li class="d-inline-block mx-4">Orientation</li>
                <input type="checkbox" name="pg_checkbox[]" value="4" class="pg_checkbox_class"><li class="d-inline-block mx-4">Pvt Bodies</li>
                <input type="checkbox" name="pg_checkbox[]" value="5" class="pg_checkbox_class"><li class="d-inline-block mx-4">Coordination Meeting Line</li>
                <input type="checkbox" name="pg_checkbox[]" value="6" class="pg_checkbox_class"><li class="d-inline-block mx-4">Mass Media Mid Media</li>
                <input type="checkbox" name="pg_checkbox[]" value="7" class="pg_checkbox_class"><li class="d-inline-block mx-4">Orientation Health</li>
                <input type="checkbox" name="pg_checkbox[]" value="8" class="pg_checkbox_class"><li class="d-inline-block mx-4">Groups Tracking</li> 
                <input type="checkbox" name="pg_checkbox[]" value="9" class="pg_checkbox_class"><li class="d-inline-block mx-4">Iec</li>
              </ul>
            </div>
            <div id="append_performance_graph">
            </div>
          </div>
        </div>

      </section>
    </div>
  </div>
<x-JsFile></x-JsFile>
@stop

