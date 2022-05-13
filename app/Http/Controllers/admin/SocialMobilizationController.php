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
use Illuminate\Support\Facades\Hash;

class SocialMobilizationController extends Controller
{
    public function social_mobilization(Request $request){
    $user_id = Auth::id();
    $today_date = date('Y-m-d');
    $data['FathBasedCount'] = SmMeetingInstitutionsReligious::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    $data['FathBasedData'] = SmMeetingInstitutionsReligious::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 

    $data['InfluencersCount'] = SmMeetingInfluencer::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    $data['InfluencerData'] = SmMeetingInfluencer::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 

    $data['NumberMeetingCount'] = SmMeetingNumbers::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    $data['NumberMeetingData'] = SmMeetingNumbers::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 

    $data['IpcMeetingCount'] = SmMeetingIpc::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    $data['IpcMeetingData'] = SmMeetingIpc::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 

    $data['MotherMeetingCount'] = SmMeetingMother::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    $data['MotherMeetingData'] = SmMeetingMother::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 

    $data['CommunityMeetingCount'] = SmMeetingCommunity::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    $data['CommunityMeetingData'] = SmMeetingCommunity::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 


       return view('admin/Social_Mobilization', $data); 
    }
    public function insert_sm_meeting_faith_based(Request $request)
    {
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
               return redirect()->back()->withErrors($validator)->withInput();
           }
            $user_id = Auth::id();
            $today_date = date('Y-m-d');
            $rowcount = SmMeetingInstitutionsReligious::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
            $inputs = $request->input();
            if($rowcount == 0){
                $res = New SmMeetingInstitutionsReligious();
            }elseif($rowcount == 1){
                $rowid = SmMeetingInstitutionsReligious::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
               $res =  SmMeetingInstitutionsReligious::find($rowid['id']);
            }

            $res->user_id = $user_id;
            $res->cate_name = 'Social Mobilization';
            $res->number_meetings = $inputs['number_meetings'];
            $res->number_participants_male  = $inputs['number_participants_male'];
            $res->number_participants_female  = $inputs['number_participants_female'];
            $res->reach_through_faitrh  = $inputs['reach_faitrh'];
            $result = $res->save();
            if($result){
                    if($rowcount == 0){
                     return redirect()->back()->with('flash-success', 'Meeting with Faith Based Institutions /Religious Leaders Added Successfully');
                 }elseif($rowcount == 1){
                     return redirect()->back()->with('flash-success', 'Meeting with Faith Based Institutions /Religious Leaders Update Successfully');
                 }
            }else{
                   return redirect()->back()->with('flash-error', 'Error occured in adding data');
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
            if ($validator->fails()) {
               return redirect()->back()->withErrors($validator, 'Meeting_Influencers')
               ->withInput();
           }

            $user_id = Auth::id();
            $today_date = date('Y-m-d');
            $rowcount = SmMeetingInfluencer::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();

           $inputs = $request->input();
           if($rowcount == 0){
                $res = New SmMeetingInfluencer();
            }elseif($rowcount == 1){
                $rowid = SmMeetingInfluencer::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
                 $res =  SmMeetingInstitutionsReligious::find($rowid['id']);
            }
           
           $res->cate_name = 'Social Mobilization';
           $res->user_id = $user_id;
           $res->number_meetings = $inputs['number_meetings'];
           $res->number_participants_male  = $inputs['number_participants_male'];
           $res->number_participants_female  = $inputs['number_participants_female'];
           $res->reach_influencers  = $inputs['reach_influencers'];
           $result = $res->save();

           if($result){
                if($rowcount == 0){
                   return redirect()->back()->with('flash-success', 'Meeting with Influencers Added Successfully')->with('meeting-influencers', 'meeting-influencer');
                }elseif($rowcount == 1){
                    return redirect()->back()->with('flash-success', 'Meeting with Influencers Update Successfully')->with('meeting-influencers', 'meeting-influencer');
                }
                
            }else{
                 return redirect()->back()->with('flash-error', 'Error occured in adding data');
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
               return redirect()->back()->withErrors($validator, 'Meeting_Numbers')->withInput();
           }

            
            $user_id = Auth::id();
            $today_date = date('Y-m-d');
            $rowcount = SmMeetingNumbers::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
            $inputs = $request->input();
            if($rowcount == 0){
                $res = New SmMeetingNumbers();
            }elseif($rowcount == 1){
                $rowid = SmMeetingNumbers::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
                $res = SmMeetingNumbers::find($rowid['id']);
            }
            $res->user_id = $user_id;
            $res->cate_name = 'Social Mobilization';
            $res->lions_club = $inputs['lions_club'];
            $res->rotary  = $inputs['rotary'];
            $res->local_csos_Others  = $inputs['local_csos_Others'];
            $result = $res->save();

            if($result){
                if($rowcount == 0){
                    return redirect()->back()->with('flash-success', 'Number of Meeting Added Successfully')->with('number-meeting', 'number-meeting');
                }elseif($rowcount == 1){
                    return redirect()->back()->with('flash-success', 'Number of Meeting Update Successfully')->with('number-meeting', 'number-meeting');
                }

            }else{
                return redirect()->back()->with('flash-error', 'Error occured in adding data');
            }
    }

    public function insert_sm_meeting_ipc(Request $request){

        $user_id = Auth::id();
        $today_date = date('Y-m-d');
        $user = SmMeetingIpc::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
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
               return redirect()->back()->withErrors($validator, 'Meeting_IPC')->withInput();
            }
            $user_id = Auth::id();
            $today_date = date('Y-m-d');
            $rowcount = SmMeetingIpc::where('user_id', $user_id)->whereDate('created_at', $today_date)->count();
            $inputs = $request->input();
            if($rowcount == 0){
                 $res = New SmMeetingIpc();
            }elseif($rowcount == 1){
                $rowid = SmMeetingIpc::where('user_id', $user_id)->wheredate('created_at', $today_date)->first();
                $res = SmMeetingIpc::find($rowid['id']);
            }
            $res->user_id = $user_id;
            $res->cate_name = 'Social Mobilization';
            $res->number_meetings = $inputs['number_meetings'];
            $res->number_participants_male  = $inputs['number_participants_male'];
            $res->number_participants_female  = $inputs['number_participants_female'];
            $result = $res->save();

            if($result){
                if($rowcount == 0){
                    return redirect()->back()->with('flash-success', 'IPC Meeting Added Successfully')->with('meeting-ipc', 'meeting-ipc');
                }elseif($rowcount == 1){
                    return redirect()->back()->with('flash-success', 'IPC Meeting Update Successfully')->with('meeting-ipc', 'meeting-ipc');
                }
            }else{
                return redirect()->back()->with('flash-error', 'Error occured in adding data');
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
           return redirect()->back()->withErrors($validator, 'Mother_Meeting')->withInput();
        }
        $user_id = Auth::id();
        $today_date = date('Y-m-d');
        $rowcount = SmMeetingMother::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        $inputs = $request->input();
        if($rowcount == 0){
            $res = New SmMeetingMother();
        }elseif($rowcount == 1){
            $rowid = SmMeetingMother::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
            $res = SmMeetingMother::find($rowid['id']);
        }
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            if($rowcount == 0){
                return redirect()->back()->with('flash-success', 'Mother Meetings Added Successfully')->with('mother-meeting', 'mother-meeting');
            }elseif($rowcount == 1){
                return redirect()->back()->with('flash-success', 'Mother Meetings Update Successfully')->with('mother-meeting', 'mother-meeting');
            }
        }else{
            return redirect()->back()->with('flash-error', 'Error occured in adding data');
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
               return redirect()->back()->withErrors($validator, 'Community_Meeting')->withInput();
           }
            $user_id = Auth::id();
            $today_date = date('Y-m-d');
            $rowcount = SmMeetingCommunity::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
           $inputs = $request->input();
           if($rowcount == 0){
                $res = New SmMeetingCommunity();
           }elseif($rowcount == 1){
                $rowid = SmMeetingCommunity::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
                $res = SmMeetingCommunity::find($rowid['id']);
           }
           $res->user_id = $user_id;
           $res->cate_name = 'Social Mobilization';
           $res->number_meetings = $inputs['number_meetings'];
           $res->number_participants_male  = $inputs['number_participants_male'];
           $res->number_participants_female  = $inputs['number_participants_female'];
           $result = $res->save();

            if($result){
            if($rowcount == 0){
                return redirect()->back()->with('flash-success', 'Community Meetings Added Successfully')->with('community-meeting', 'community-meeting');
            }elseif($rowcount == 1){
                return redirect()->back()->with('flash-success', 'Community Meetings Update Successfully')->with('community-meeting', 'community-meeting');
               }
            }else{
                return redirect()->back()->with('flash-error', 'Error occured in adding data');
            }
    }
public function sm_shg_meeting(Request $request){

    $user_id = Auth::id();
    $today_date = date('Y-m-d');
    $user = SmMeetingShg::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    if($user == 0){
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
            return redirect()->back()->withErrors($validator, 'SHG_Meeting')->withInput();
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
            return redirect()->back()->with('flash-success', 'Meeting with SHG Members Added Successfully')->with('shg-meeting', 'shg-meeting');
        }else{
            return redirect()->back()->with('flash-error', 'Error occured in adding data');
        }
    }else{
             return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('shg-meeting', 'shg-meeting');
    }
}

public function sm_vulrenable_meeting(Request $request){
    $user_id = Auth::id();
    $today_date = date('Y-m-d');
    $user = SmMeetingVulrenable::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    if($user == 0){
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
            return redirect()->back()->withErrors($validator, 'Vulrenable_Meeting')->withInput();
        }

        $inputs = $request->input();
        $res = New SmMeetingVulrenable();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect()->back()->with('flash-success', 'Meeting with Vulrenable Groups Sites Added Successfully')->with('vulrenable-group-meeting', 'vulrenable-group-meeting');
        }else{
            return redirect()->back()->with('flash-error', 'Error occured in adding data');
        }
    }
    else{
            return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('vulrenable-group-meeting', 'vulrenable-group-meeting');
    }

}

public function sm_excluded_groups(Request $request){
    $user_id = Auth::id();
    $today_date = date('Y-m-d');
    $user = SmExcludedGroups::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    if($user == 0){
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
            return redirect()->back()->withErrors($validator, 'Excluded_Meeting')->withInput();
        }

        $inputs = $request->input();
        $res = New SmExcludedGroups();
        $res->user_id = $user_id;
        $res->cate_name = 'Social Mobilization';
        $res->number_meetings = $inputs['number_meetings'];
        $res->number_participants_male  = $inputs['number_participants_male'];
        $res->number_participants_female  = $inputs['number_participants_female'];
        $result = $res->save();

        if($result){
            return redirect()->back()->with('flash-success', 'Meeting with excluded groups(PWD,Transgender) Added Successfully')->with('excluded-group-meeting', 'excluded-group-meeting');
        }else{
            return redirect()->back()->with('flash-error', 'Error occured in adding data');
        }
    }else{
            return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('excluded-group-meeting', 'excluded-group-meeting');
    }
}

public function sm_volunteer_meeting(Request $request){
    $user_id = Auth::id();
    $today_date = date('Y-m-d');
    $user = SmVolunteerMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    if($user == 0){
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
                return redirect()->back()->withErrors($validator, 'Volunteer_Meeting')->withInput();
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
                return redirect()->back()->with('flash-success', 'Meeting with the volunteer organization Added Successfully')->with('volunteer-meeting', 'volunteer-meeting');
            }else{
                return redirect()->back()->with('flash-error', 'Error occured in adding data')->with('volunteer-meeting', 'volunteer-meeting');
            }
        }else{
            return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('volunteer-meeting', 'volunteer-meeting');
        }
    }


}
