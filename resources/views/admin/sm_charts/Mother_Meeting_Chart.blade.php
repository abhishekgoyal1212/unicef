@extends('admin/dashboard/index')
@section('content')
<?php $first_segments_sidebar = Request::route()->action['as'];?>
<div class="col-sm-9">
  <br><br><br>
<div class="row">
    <div class="col-md-8 pr-lg-4">
      <h3 class="tab-head">Select Chart</h3>
      <select class="w-100 bg-transparent mt-3 py-3 px-2 category" onchange="location = this.value;">
           <option value="{{route('admin.SmFaithBasedInstitutionsChart')}}" {{$first_segments_sidebar == 'admin.SmFaithBasedInstitutionsChart' ? 'selected' : '' }}>Meeting with Faith Based Institutions /Religious Leaders</option>
           <option value="{{route('admin.SmNumberMeetingCharts')}}" {{$first_segments_sidebar == 'admin.SmNumberMeetingCharts' ? 'selected' : '' }}>Number of Meeting</option>
           <option value="{{route('admin.SmMeetingInfluencersCharts')}}" {{$first_segments_sidebar == 'admin.SmMeetingInfluencersCharts' ? 'selected' : '' }}>Meeting with Influencers</option>
           <option value="{{route('admin.SmMotherMeetingChart')}}" {{$first_segments_sidebar == 'admin.SmMotherMeetingChart' ? 'selected' : '' }}>Mother Meetings</option>
           <option value="{{route('admin.SmCommunityMeetingChart')}}" {{$first_segments_sidebar == 'admin.SmCommunityMeetingChart' ? 'selected' : '' }}>Community Meetings</option>
           <option value="{{route('admin.SmShgMeetingChart')}}" {{$first_segments_sidebar == 'admin.SmShgMeetingChart' ? 'selected' : '' }}>Meeting with SHG Members</option>
      </select>
    </div>              
</div>
 <div class="row my-4">
        <div class="col-md-8 pr-lg-4">
          <h4 class="mb-4">Mother Meetings Chart</h4>
          <div id="amchart"></div>
          {{--<img src="{{asset('public/dashboard/img/bar-graph.jpg') }}" width="100%" alt="">--}}
        </div>
      </div>
</div>

<script>

</script>
@stop