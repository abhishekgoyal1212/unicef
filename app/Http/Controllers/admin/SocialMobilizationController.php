<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\SocialMobilization\SmMeetingInfluencer;
use App\Models\SocialMobilization\SmMeetingInstitutionsReligious;
use App\Models\SocialMobilization\SmMeetingNumbers;
use App\Models\SocialMobilization\SmMeetingIpc;
use App\Models\SocialMobilization\SmMeetingMother;
use App\Models\SocialMobilization\SmMeetingCommunity;
use App\Models\SocialMobilization\SmMeetingShg;
use App\Models\SocialMobilization\SmMeetingVulrenable;
use App\Models\SocialMobilization\SmExcludedGroups;
use App\Models\SocialMobilization\SmVolunteerMeeting;

use Auth;

class SocialMobilizationController extends Controller
{
    
    public function insert_sm_meeting_faith_based(Request $request){
        $validator = Validator::make($request->all(), [
            'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
            'reach_faitrh' => 'required',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
            'reach_faitrh.required' => 'This field is required',
        ]);

         if ($validator->fails()) {
         return redirect('/admin/Social_Mobilization')
                        ->withErrors($validator)
                        ->withInput();
        }

        $inputs = $request->input();
        $user_id = Auth::id();
        $res = New SmMeetingInstitutionsReligious();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $res->reach_through_faitrh  = $inputs['reach_faitrh'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }


    public function insert_sm_meeting_influencers(Request $request){
         $validator = Validator::make($request->all(), [
           'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
            'reach_influencers' => 'required',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
            'reach_influencers.required' => 'This field is required',
        ]);
       // dd($validator->errors());
      
        // if ($validator->fails()) {
        // return back()->withErrors($validator, 'Meeting_Influencers')->withInput();
        // }    

        if ($validator->fails()) {
         return redirect('admin/Social_Mobilization')->withErrors($validator, 'Meeting_Influencers')
                        ->withInput();
        }

        $inputs = $request->input();
        $user_id = Auth::id();
        $res = New SmMeetingInfluencer();
        $res->cate_name = 'Social Mobilization';
        $res->user_id = $user_id;
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $res->reach_influencers  = $inputs['reach_influencers'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }


    public function insert_sm_meeting_numbers(Request $request){
        $validator = Validator::make($request->all(), [
            'lions_club' => 'required',
            'rotary' => 'required',
            'local_csos_Others' => 'required',
        ],[
            'lions_club.required' => 'This field is required',
            'rotary.required' => 'This field is required',
            'local_csos_Others.required' => 'This field is required',
        ]);

        if ($validator->fails()) {
         return redirect('admin/Social_Mobilization')->withErrors($validator, 'Meeting_Numbers')->withInput();
        }

        $inputs = $request->input();
        $user_id = Auth::id();
        $res = New SmMeetingNumbers();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->lions_club = $inputs['lions_club'];
        $res->rotary  = $inputs['rotary'];
        $res->local_csos_Others  = $inputs['local_csos_Others'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }

    }

    public function insert_sm_meeting_ipc(Request $request){
       $validator = Validator::make($request->all(), [
           'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
        ]);
        if ($validator->fails()) {
         return redirect('admin/Social_Mobilization')->withErrors($validator, 'Meeting_IPC')->withInput();
        }

        $inputs = $request->input();
        $user_id = Auth::id();
        $res = New SmMeetingIpc();
         $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }

    public function insert_sm_mother_meeting(Request $request){
       $validator = Validator::make($request->all(), [
            'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
        ]);
        if ($validator->fails()) {
         return redirect('admin/Social_Mobilization')->withErrors($validator, 'Mother_Meeting')->withInput();
        }

        $inputs = $request->input();
        $user_id = Auth::id();
        $res = New SmMeetingMother();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }

    public function sm_community(Request $request){
        $validator = Validator::make($request->all(), [
            'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
        ]);
        if ($validator->fails()) {
         return redirect('admin/Social_Mobilization')->withErrors($validator, 'Community_Meeting')->withInput();
        }
        $user_id = Auth::id();
        $inputs = $request->input();
        $res = New SmMeetingCommunity();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }
    public function sm_shg_meeting(Request $request){
        $validator = Validator::make($request->all(), [
            'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
        ]);
        if($validator->fails()){
            return redirect('admin/Social_Mobilization')->withErrors($validator, 'SHG_Meeting')->withInput();
        }
        $user_id = Auth::id();
        $inputs = $request->input();
        $res = New SmMeetingShg();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }

    public function sm_vulrenable_meeting(Request $request){
        $validator = Validator::make($request->all(), [
            'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
        ]);
        if($validator->fails()){
            return redirect('admin/Social_Mobilization')->withErrors($validator, 'Vulrenable_Meeting')->withInput();
        }

        $user_id = Auth::id();
        $inputs = $request->input();
        $res = New SmMeetingVulrenable();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }

     public function sm_excluded_groups(Request $request){
        $validator = Validator::make($request->all(), [
            'number_meetings' => 'required|numeric',
            'number_participants_male' => 'required|numeric',
            'number_participants_female' => 'required|numeric',
        ],[
            'number_meetings.required' => 'This field is required',
            'number_meetings.numeric' => 'Value must be numeric',
            'number_participants_male.required' => 'This field is required',
            'number_participants_male.numeric' => 'Value must be numeric',
            'number_participants_female.required' => 'This field is required',
            'number_participants_female.numeric' => 'Value must be numeric',
        ]);
        if($validator->fails()){
            return redirect('admin/Social_Mobilization')->withErrors($validator, 'Excluded_Meeting')->withInput();
        }
        
        $user_id = Auth::id();
        $inputs = $request->input();
        $res = New SmExcludedGroups();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }

    public function sm_volunteer_meeting(Request $request){
         $inputs = $request->input();
        $validator = Validator::make($request->all(), [
            'nyks_number_meetings' => 'required|numeric',
            'nyks_participants_male' => 'required|numeric',
            'nyks_participants_female' => 'required|numeric',
            'nss_number_meetings' => 'required|numeric',
            'nss_participants_male' => 'required|numeric',
            'nss_participants_female' => 'required|numeric',
            'bsg_number_meetings' => 'required|numeric',
            'bsg_participants_male' => 'required|numeric',
            'bsg_participants_female' => 'required|numeric',
        ]);
        if($validator->fails()){
            return redirect('admin/Social_Mobilization')->withErrors($validator, 'Volunteer_Meeting')->withInput();
        }
        
        $user_id = Auth::id();
        $inputs = $request->input();
        $res = New SmVolunteerMeeting();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->nyks_number_meetings = $inputs['nyks_number_meetings'];
        $res->nyks_participants_male = $inputs['nyks_participants_male'];
        $res->nyks_participants_female = $inputs['nyks_participants_female'];
        $res->nss_number_meetings = $inputs['nss_number_meetings'];
        $res->nss_participants_male = $inputs['nss_participants_male'];
        $res->nss_participants_female = $inputs['nss_participants_female'];
        $res->bsg_number_meetings = $inputs['bsg_number_meetings'];
        $res->bsg_participants_male = $inputs['bsg_participants_male'];
        $res->bsg_participants_female = $inputs['bsg_participants_female'];
        $result = $res->save();

        if($result){
            return redirect('admin/Social_Mobilization')->with('flash-success', 'Meeting with Influencers Record Added Successfully');
        }else{
            return redirect('admin/Social_Mobilization')->with('flash-error', 'Some Error Occurred In Adding Meeting with Influencers Record');
        }
    }
}
