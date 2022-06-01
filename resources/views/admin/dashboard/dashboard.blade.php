 @extends('admin.dashboard.index')
 @section('title','Dashboard')
 @section('content')

 <style>
  #Covid h4.my-5{
    font-weight: normal;
  }
  .chartdiv {
    width: 100%;
    height: 350px;
    background-color: #e1e2e3a1;
  }
  /*#append_pvt_bodies_graph{
      background-color: #e1e2e3a1;

  }*/
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
  padding: 6px;
  width: 95%;
  font-size: 16px;
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
.custom-date-sec.extra-custome input {
  width: 95%;
}
.topic select,select#select_value,select#pp_select_value_id1{
  padding: 10px;
}
.dashboard-right-section {
  padding-right: 60px;
  padding-bottom: 40px;
}
.start_date{
  width: 100%;
}
.multiselect-selected-text{
  font-size: 13px !important;
}
.report-box.report-number a {
  text-decoration: none;
}

.report-box.report-number a h4{
  font-size: 18px;
  color: #000;
  font-weight: 600;
}
.multiselect-container>li>a>label{
  padding: 5px 0px 7px 20px;
}
ul.multiselect-container.dropdown-menu.month-section li{
  font-size: 14px
}



.dropdown dd, .dropdown dt {
    margin:0px;
    padding:0px;
}
.dropdown ul {
    margin: -1px 0 0 0;
}
.dropdown dd {
    position:relative;
}
.dropdown a, 
.dropdown a:visited {
    color:#fff;
    text-decoration:none;
    outline:none;
    font-size: 12px;
}
.dropdown dt a {
    background-color: #fff;
    display: block;
    padding: 20px;
    line-height: 24px;
    overflow: hidden;
    border: 0;
    border-radius: 10px;
}
.dropdown dt a span, .multiSel span {
    cursor:pointer;
    display:inline-block;
    padding: 0 3px 2px 0;
        color: #000;
    font-weight: 400;
    font-size: 14px;
}
.dropdown dd ul {
    background-color: #ffffff;
    border: 0;
    color: #000;
    display: none;
    left: 0px;
    padding: 2px 15px 2px 5px;
    position: absolute;
    top: 2px;
    list-style: none;
    overflow: auto;
    width: 100%;
    font-size: 14px;
    z-index: 99;
}
.dropdown span.value {
    display:none;
}
.mutliSelect ul li input {
    margin-right: 10px;
}
.dropdown dd ul li a {
    padding:5px;
    display:block;
}
.dropdown dd ul li a:hover {
    background-color:#fff;
}
.mutliSelect ul li {
    padding: 10px 0px 0px 15px;
}
/*.dropdown::before {
    content: "";
    background: url(https://img.icons8.com/ios-glyphs/20/000000/expand-arrow--v1.png);
    width: 20px;
    height: 20px;
    position: absolute;
    right: 14px;
    top: 30%;
    font-size: 22px;
}*/
</style>
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
              <a href="#"> <img class="rounded-circle" src="{{asset('public/users-image/'. auth()->user()->profile)}}" alt="" width="100" height="100" id="showmenu"></a>
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
<!--               <select class="select_value" id="yes_no_in_district">
                 <option value="1">Yes</option>
                 <option value="0">No</option>
               </select> -->
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
<!--               <select class="select_value" id="yes_no_in_district">
                 <option value="1">Yes</option>
                 <option value="0">No</option>
               </select> -->
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

          

        <!-- <div class="col-lg-3" >
            <lable class="lable">From Date</lable>
            <input type="text" name="group_tracking_from_date" class="start_date" value="2022-04-01">
        </div>
        <div class="col-lg-3">
            <lable class="lable">To Date</lable>
          <input type="text" name="group_tracking_to_date" class="start_date" value="2022-04-15">
        </div>
              <div class="select-sec-box col-md-6">
                <h5>Select District</h5>
                  <select class="select_value" id="group_select_value">
                    @foreach($districts as $value)
                    <option value="{{$value->id}}">{{$value->districts}}</option>
                    @endforeach
                  </select>
              </div>
               <div class="col-md-12">
        
          <div id="appendamchart2">
          </div>
          {{--<img src="{{ asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
        </div> 
      </div> -->



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
        <!-- Custom tabs (Charts with tabs)-->
        <div class="card mt-5">
          <div class="card-header ui-sortable-handle" style="cursor: move; background: transparent;">
              <!-- <h3 class="card-title">
                <i class="far fa-chart-bar"></i>
                Line Chart
              </h3> -->
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
        // console.log(data);
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

@stop

