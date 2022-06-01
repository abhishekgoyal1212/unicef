<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PlaningPlatform\Planing;
use App\Models\PlaningPlatform\NigraniSamitiMeeting;
use App\Models\PlaningPlatform\DistrictCommunication;
use App\Models\PlaningPlatform\FortnightlyReport;
use App\Models\Coordination\Coordination;
use App\Models\PvtBodies\MeetingIMA;
use App\Models\MassMedia\MassMedia;
use App\Models\SocialMobilization\SmExcludedGroups;
use App\Models\SocialMobilization\SmMeetingCommunity;
use App\Models\SocialMobilization\SmMeetingInfluencer;
use App\Models\SocialMobilization\SmMeetingInstitutionsReligious;
use App\Models\SocialMobilization\SmMeetingIpc;
use App\Models\SocialMobilization\SmMeetingMother;
use App\Models\SocialMobilization\SmMeetingNumbers;
use App\Models\SocialMobilization\SmMeetingShg;
use App\Models\SocialMobilization\SmMeetingVulrenable;
use App\Models\SocialMobilization\SmVolunteerMeeting;
use App\Models\PvtBodies\MeetingPractitioners;
use App\Models\PvtBodies\MerchantAssociation;
use App\Models\PvtBodies\Others;
use App\Models\PvtBodies\PharmacistsAssociations;


use Auth;
use Str;
use Validator;
use Hash;
use DB;

class DashboardController extends Controller
{
	public function index()
	{
		$data['current_Month'] =(int) date('m');
		$SmSum1 = SmExcludedGroups::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->first();	
		$SmSum2 = SmMeetingCommunity::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->first();	
		$SmSum3 = SmMeetingInfluencer::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->first();	
		$SmSum4 = SmMeetingInstitutionsReligious::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_Female) as total'))->first();	
		$SmSum5 = SmMeetingIpc::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->first();	
		$SmSum6 = SmMeetingMother::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->first();	
		$SmSum7 = SmMeetingShg::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->first();	
		$SmSum8 = SmMeetingVulrenable::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->first();	
		$SmSum9 = SmVolunteerMeeting::select(DB::raw('SUM(nyks_participants_male)+SUM(nyks_participants_female)+SUM(nss_participants_male)+SUM(nss_participants_female)+SUM(bsg_participants_male)+SUM(bsg_participants_female) as total'))->first();	

		$data['SmSum'] = $SmSum1->total + $SmSum2->total+ $SmSum3->total+ $SmSum4->total+ $SmSum5->total+ $SmSum6->total+ $SmSum7->total+ $SmSum8->total+ $SmSum9->total;

		$MmSum= MassMedia::select(DB::raw('SUM(rally_covid_reach_male)+SUM(rally_covid_reach_female)+SUM(nukad_natak_reach_male)+SUM(nukad_natak_reach_female)+SUM(flok_program_reach_male)+SUM(flok_program_reach_female)+SUM(local_community_reach_male)+SUM(local_community_reach_female)+SUM(cable_tv_reach_male)+SUM(cable_tv_reach_female)+SUM(flash_mob_reach_male)+SUM(flash_mob_reach_female)+SUM(others_reach_male)+SUM(others_reach_female)  as total'))->first();

		$data['MassMediaSum'] = $MmSum->total;

		$PvtSum1 = MeetingIMA::select(DB::raw('SUM(number_participants) as total'))->first();	
		$PvtSum2 = MeetingPractitioners::select(DB::raw('SUM(number_participants) as total'))->first();	
		$PvtSum3 = MerchantAssociation::select(DB::raw('SUM(number_participants) as total'))->first();	
		$PvtSum4 = Others::select(DB::raw('SUM(number_participants) as total'))->first();	
		$PvtSum5 = PharmacistsAssociations::select(DB::raw('SUM(number_participants) as total'))->first();	
		$data['PvtSum'] = $PvtSum1->total + $PvtSum2->total + $PvtSum3->total + $PvtSum4->total + $PvtSum5->total;

		$data['districts'] = User::orderBy('districts', 'Asc')->get();
		return view('admin/dashboard/dashboard', $data);	
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect()->route('login');
	}
	public function profile(){
		return view('admin.dashboard.profile');

	}
	public function update_profile(Request $request){
		$request->validate([
			'name' => 'required',
			'districts' => 'required',
			'mobile' => 'required|numeric|min:10',
			'file' => '',
		]);
		$inputs = $request->input();
		$user_id = Auth::id();

		$res = User::find($user_id);
		$res->name = $inputs['name'];
		$res->mobile_no = $inputs['mobile'];
		$res->districts = $inputs['districts'];
		$result = $res->save();
		if($result){
			return redirect()->back()->with('flash-success', 'Profile Details Update Successfully');
		}
		else{
			return redirect()->back()->with('flash-error', 'Error occured');
		}
	}

	public function update_profile_photo(Request $request){
		
		$user_id = Auth::id();
		$res = User::find($user_id);
		$previous_image = $res->profile;
		if($_FILES['avatar']['name'] != ''){
			$img_name  = time() . '-' . Str::of(md5(time() . $request->file('avatar')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('avatar')->extension();
			$path = $request->file('avatar')->move(public_path('users-image'), $img_name);
			$admindata['avatar'] = $img_name;
			if($previous_image !=''){
				$paths = public_path('users-image'.$previous_image);
				if(!empty(file_exists($paths))){
					unlink($paths);
				}
			}
        	// if (!empty($previous_image)) {
         //        Storage::delete('public\user-assets\img\users-image'. $previous_image);
         //    }
		}	

		$res->profile = $admindata['avatar'];
		$result = $res->save();

		if ($result) {
			echo  '1' ;
		} else {
			echo  '0' ;
		}
	}

	public function update_password(Request $request){
		$inputs = $request->input();
		$validator = Validator::make($request->all(),[
			'current_password' => 'required',
			'password' => 'required',
			'confirm_password' => 'required|same:password',
		]);
		if($validator->fails()){
			return redirect('profile?type=update_password')->withErrors($validator)->withInput();
		}
		$user_id = Auth::id();

		$res = User::find($user_id);

		$hashPassword = $res->password;
		
		if(Hash::check($inputs['current_password'], $hashPassword))
		{
			$res->password = Hash::make($inputs['password']);
			$result = $res->save();
			if($result){
				return redirect()->back()->with('flash-success', 'Password Update Successfully');
			}
			else{
				return redirect()->back()->with('flash-error', 'Error occured');
			}

		}else{
			return redirect('profile?type=update_password')->with('flash-error', 'old password doesnt matched');
		}
		
	}
	public function fetch_graph_data(Request $request){
		$inputs = $request->input();
		$from_date = date($inputs['from_date']);
		$to_date = date($inputs['to_date']);
		$chartvalue = $inputs['chartvalueresult'];
		if($chartvalue == 1){
			// DB::getQueryLog();
			$data = DB::table('meeting_institutions_religious_leaders')
			->join('users', 'users.id', '=', 'meeting_institutions_religious_leaders.user_id')
			->select('users.districts', DB::raw('SUM(meeting_institutions_religious_leaders.number_meetings) as meeting'), DB::raw('SUM(meeting_institutions_religious_leaders.number_participants_male) as male'), DB::raw('SUM(meeting_institutions_religious_leaders.number_participants_female) as female'))
			->whereBetween('meeting_institutions_religious_leaders.created_at', [$from_date, $to_date])
			->orWhereDate('meeting_institutions_religious_leaders.created_at', $from_date)
			->orWhereDate('meeting_institutions_religious_leaders.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}
		}
		if($chartvalue == 2){
			$data = DB::table('sm_meeting_influencers')
			->join('users', 'users.id', '=', 'sm_meeting_influencers.user_id')
			->select('users.districts', DB::raw('SUM(sm_meeting_influencers.number_meetings) as meeting'), DB::raw('SUM(sm_meeting_influencers.number_participants_male) as male'), DB::raw('SUM(sm_meeting_influencers.number_participants_female) as female'))
			->whereBetween('sm_meeting_influencers.created_at', [$from_date, $to_date])
			->orWhereDate('sm_meeting_influencers.created_at', $from_date)
			->orWhereDate('sm_meeting_influencers.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}
		}
		if($chartvalue == 3){
			$data = DB::table('sm_number_meeting')
			->join('users', 'users.id', '=', 'sm_number_meeting.user_id')
			->select('users.districts', DB::raw('SUM(sm_number_meeting.lions_club) as lions_club'), DB::raw('SUM(sm_number_meeting.rotary) as rotary_club'), DB::raw('SUM(sm_number_meeting.local_csos_Others) as locals'))
			->whereBetween('sm_number_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_number_meeting.created_at', $from_date)
			->orWhereDate('sm_number_meeting.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->lions_club = (int)$value->lions_club;
				$value->rotary_club = (int)$value->rotary_club;
				$value->locals = (int)$value->locals;
			}
		}
		if($chartvalue == 4){
			$data = DB::table('sm_ipc')
			->join('users', 'users.id', '=', 'sm_ipc.user_id')
			->select('users.districts', DB::raw('SUM(sm_ipc.number_meetings) as meeting'), DB::raw('SUM(sm_ipc.number_participants_male) as male'), DB::raw('SUM(sm_ipc.number_participants_female) as female'))
			->whereBetween('sm_ipc.created_at', [$from_date, $to_date])
			->orWhereDate('sm_ipc.created_at', $from_date)
			->orWhereDate('sm_ipc.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}
		}
		if($chartvalue == 5){
			$data = DB::table('sm_mother_meeting')
			->join('users', 'users.id', '=', 'sm_mother_meeting.user_id')
			->select('users.districts', DB::raw('SUM(sm_mother_meeting.number_meetings) as meeting'), DB::raw('SUM(sm_mother_meeting.number_participants_male) as male'), DB::raw('SUM(sm_mother_meeting.number_participants_female) as female'))
			->whereBetween('sm_mother_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_mother_meeting.created_at', $from_date)
			->orWhereDate('sm_mother_meeting.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}

		}
		if($chartvalue == 6){
			$data = DB::table('sm_community_meeting')
			->join('users', 'users.id', '=', 'sm_community_meeting.user_id')
			->select('users.districts', DB::raw('SUM(sm_community_meeting.number_meetings) as meeting'), DB::raw('SUM(sm_community_meeting.number_participants_male) as male'), DB::raw('SUM(sm_community_meeting.number_participants_female) as female'))
			->whereBetween('sm_community_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_community_meeting.created_at', $from_date)
			->orWhereDate('sm_community_meeting.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}
		}
		if($chartvalue == 7){
			$data = DB::table('sm_shg_member_meeting')
			->join('users', 'users.id', '=', 'sm_shg_member_meeting.user_id')
			->select('users.districts', DB::raw('SUM(sm_shg_member_meeting.number_meetings) as meeting'), DB::raw('SUM(sm_shg_member_meeting.number_participants_male) as male'), DB::raw('SUM(sm_shg_member_meeting.number_participants_female) as female'))
			->whereBetween('sm_shg_member_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_shg_member_meeting.created_at', $from_date)
			->orWhereDate('sm_shg_member_meeting.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}
		}
		if($chartvalue == 8){
			$data = DB::table('sm_vulrenable_groups_meeting')
			->join('users', 'users.id', '=', 'sm_vulrenable_groups_meeting.user_id')
			->select('users.districts', DB::raw('SUM(sm_vulrenable_groups_meeting.number_meetings) as meeting'), DB::raw('SUM(sm_vulrenable_groups_meeting.number_participants_male) as male'), DB::raw('SUM(sm_vulrenable_groups_meeting.number_participants_female) as female'))
			->whereBetween('sm_vulrenable_groups_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_vulrenable_groups_meeting.created_at', $from_date)
			->orWhereDate('sm_vulrenable_groups_meeting.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}
		}
		if($chartvalue == 9){
			$data = DB::table('sm_excluded_groups_meeting')
			->join('users', 'users.id', '=', 'sm_excluded_groups_meeting.user_id')
			->select('users.districts', DB::raw('SUM(sm_excluded_groups_meeting.number_meetings) as meeting'), DB::raw('SUM(sm_excluded_groups_meeting.number_participants_male) as male'), DB::raw('SUM(sm_excluded_groups_meeting.number_participants_female) as female'))
			->whereBetween('sm_excluded_groups_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_excluded_groups_meeting.created_at', $from_date)
			->orWhereDate('sm_excluded_groups_meeting.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			foreach($data as $key => $value){
				$value->meeting = (int)$value->meeting;
				$value->male = (int)$value->male;
				$value->female = (int)$value->female;
			}

		}
		if($chartvalue == 10){
			$data = DB::table('sm_volunteer_organization_meeting')
			->join('users', 'users.id', '=', 'sm_volunteer_organization_meeting.user_id')
			->select('users.districts', DB::raw('SUM(sm_volunteer_organization_meeting.nyks_number_meetings) as nyks_number_meetings'), DB::raw('SUM(sm_volunteer_organization_meeting.nyks_participants_male) as nyks_participants_male'), DB::raw('SUM(sm_volunteer_organization_meeting.nyks_participants_female) as nyks_participants_female'), DB::raw('SUM(sm_volunteer_organization_meeting.nss_number_meetings) as nss_number_meetings'), DB::raw('SUM(sm_volunteer_organization_meeting.nss_participants_male) as nss_participants_male'), DB::raw('SUM(sm_volunteer_organization_meeting.nss_participants_female) as nss_participants_female'),DB::raw('SUM(sm_volunteer_organization_meeting.bsg_number_meetings) as bsg_number_meetings'),DB::raw('SUM(sm_volunteer_organization_meeting.bsg_participants_male) as bsg_participants_male'),DB::raw('SUM(sm_volunteer_organization_meeting.bsg_participants_female) as bsg_participants_female'))
			->whereBetween('sm_volunteer_organization_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_volunteer_organization_meeting.created_at', $from_date)
			->orWhereDate('sm_volunteer_organization_meeting.created_at', $to_date)
			->groupBy('users.districts')
			->get();
			
			foreach($data as $key => $value){
				$value->nyks_number_meetings = (int)$value->nyks_number_meetings;
				$value->nyks_participants_male = (int)$value->nyks_participants_male;
				$value->nyks_participants_female = (int)$value->nyks_participants_female;
				$value->nss_number_meetings = (int)$value->nss_number_meetings;
				$value->nss_participants_male = (int)$value->nss_participants_male;
				$value->nss_participants_female = (int)$value->nss_participants_female;
				$value->bsg_number_meetings = (int)$value->bsg_number_meetings;
				$value->bsg_participants_male = (int)$value->bsg_participants_male;
				$value->bsg_participants_female = (int)$value->bsg_participants_female;
			}
		}

		$count = count($data);
		if($count == 0){
			$data = 'error';
			echo $data;
		}
		else{
			echo $data;
		}
	}

	public function planning_graph(Request $request){
		$inputs = $request->all();
		$to_date = date($inputs['todate']);
		$from_date = date($inputs['date']);
		$planingchartvalue = ($inputs['planingchartvalue']);
		if ($planingchartvalue == 1) {
			$data = Planing::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('wheather_meeting as yes')->get();
		}else if($planingchartvalue == 2) {
			$data = Planing::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('wheather_Consultant as yes')->get();
		}else if($planingchartvalue == 3) {
			$data = Planing::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('suggestions_Consultant as yes')->get();
		}else if($planingchartvalue == 4) {
			$data = NigraniSamitiMeeting::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('wheather_meeting as yes')->get();
		}else if($planingchartvalue == 5) {
			$data = NigraniSamitiMeeting::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('wheather_consultant_participated as yes')->get();
		}else if($planingchartvalue == 6) {
			$data = DistrictCommunication::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('wheather_developed as yes')->get();
		}else if($planingchartvalue == 7) {
			$data = FortnightlyReport::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('first_fortnighly_report as yes')->get();
		}else if($planingchartvalue == 8) {
			$data = FortnightlyReport::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('second_fortnighly_report as yes')->get();
		}
		$arrayName = ["Yes" => 0,"No" => 0];
		foreach($data as $key => $value){
			if($value->yes == 0){
				$arrayName['No']++;
			}elseif($value->yes == 1){
				$arrayName['Yes']++;
			}
		}

		$date = $inputs['date'];
		$chartvaluenumber = $inputs['planingchartvalue'];
			if($chartvaluenumber == 1) {
			$data = Planing::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','wheather_meeting as condition')->groupBy('user_id','condition')->get();

			}else if($chartvaluenumber == 2){
				$data = Planing::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','wheather_Consultant as condition')->groupBy('user_id','condition')->get();
			}else if($chartvaluenumber == 3) {
				$data = Planing::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','suggestions_Consultant as condition')->groupBy('user_id','condition')->get();
			}else if($chartvaluenumber == 4) {
				$data = NigraniSamitiMeeting::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','wheather_meeting as condition')->groupBy('user_id','condition')->get();				
			}else if($chartvaluenumber == 5) {
				$data = NigraniSamitiMeeting::whereDate('created_at',$date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','wheather_consultant_participated as condition')->groupBy('user_id','condition')->get();
			}else if($chartvaluenumber == 6) {
				$data = DistrictCommunication::whereDate('created_at',$date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','wheather_developed as condition')->groupBy('user_id','condition')->get();
			}else if($chartvaluenumber == 7) {
				$data = FortnightlyReport::whereDate('created_at',$date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','first_fortnighly_report as condition')->groupBy('user_id','condition')->get();
			}else if($chartvaluenumber == 8) {
				$data = FortnightlyReport::whereDate('created_at',$date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','second_fortnighly_report as condition')->groupBy('user_id','condition')->get();
			}
			$arrayName['yes_no_values'] = $data;
			echo json_encode($arrayName);
	}

	public function coordination_graph(Request $request){
		$inputs = $request->all();
		$from_date = date($inputs['date']);
		$to_date = date($inputs['todate']);
		$coordinationchartvalue = ($inputs['coordinationvalue']);
	
		if($coordinationchartvalue == 1) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('panchayti_rural_development as yes')->get();
		}
		if($coordinationchartvalue == 2) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('icds as yes')->get();
		}
		if($coordinationchartvalue == 3) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('education as yes')->get();
		}
		if($coordinationchartvalue == 4) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('srlm as yes')->get();
		}
		if($coordinationchartvalue == 5) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('tribal_area as yes')->get();
		}
		if($coordinationchartvalue == 6) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->select('dmwo as yes')->get();
		}
			
			$arrayName = ["Yes" => 0,"No" => 0];
			foreach($data as $key => $value){
				if($value->yes == 0){
					$arrayName['No']++;
				}elseif($value->yes == 1){
					$arrayName['Yes']++;
				}
			}

		if($coordinationchartvalue == 1) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','panchayti_rural_development as condition')->groupBy('user_id','condition')->get();
		}
		if($coordinationchartvalue == 2) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','icds as condition')->groupBy('user_id','condition')->get();
		}
		if($coordinationchartvalue == 3) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','education as condition')->groupBy('user_id','condition')->get();
		}
		if($coordinationchartvalue == 4) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','srlm as condition')->groupBy('user_id','condition')->get();
		}
		if($coordinationchartvalue == 5) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','tribal_area as condition')->groupBy('user_id','condition')->get();
		}
		if($coordinationchartvalue == 6) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select(DB::raw('COUNT(*) `cnt`'),'user_id','dmwo as condition')->groupBy('user_id','condition')->get();
		}

		$arrayName['yes_no_values'] = $data;
			echo json_encode($arrayName);
	}
	public function pvt_bodies_graph(Request $request){
		$inputs = $request->input();
		$from_date = date($inputs['start_date']);
		$to_date = date($inputs['end_date']);
		$pvtchartvalue = $inputs['pvtbodiesvalue'];

		$total_participants = DB::table($pvtchartvalue)->select(DB::raw('SUM(number_participants) as participants'))->whereBetween('created_at', [$from_date, $to_date])
		->orWhereDate('created_at', $from_date)
		->orWhereDate('created_at', $to_date)
		->first();
		$total_participants = $total_participants->participants;
		
		
		$data = DB::table($pvtchartvalue)
		->join('users', 'users.id', '=', $pvtchartvalue.'.user_id')
		->select('users.districts', DB::raw('SUM('.$pvtchartvalue.'.number_meeting) as meeting'), DB::raw('SUM('.$pvtchartvalue.'.number_participants) as participants'), DB::raw('COUNT(users.districts) as districtscount'))
		->whereBetween($pvtchartvalue.'.created_at', [$from_date, $to_date])
		->orWhereDate($pvtchartvalue.'.created_at', $from_date)
		->orWhereDate($pvtchartvalue.'.created_at', $to_date)
		->orderBy('participants', 'Desc')
		->groupBy('users.districts')
		->get();

			foreach($data as $key => $value){
				$value->percent = $value->participants*100/$total_participants;
			}
			
		echo json_encode($data);
	}

	public function mass_media_graph(Request $request)
	{
		$inputs = $request->all();
		$from_date = date($inputs['start_date']);
		$to_date = date($inputs['end_date']);
		$masschartvalue = $inputs['mass_media_value'];

		$data = DB::table('mass_media_mid_media')
		->select(DB::raw('SUM(rally_covid_vaccination) as type'),
			DB::raw('SUM(rally_covid_reach_male) as male'),
			DB::raw('SUM(rally_covid_reach_female) as female'),

			DB::raw('SUM(nukad_natak) as type1'),
			DB::raw('SUM(nukad_natak_reach_male) as male1'), 
			DB::raw('SUM(nukad_natak_reach_female) as female1'),

			DB::raw('SUM(flok_program) as type2'),
			DB::raw('SUM(flok_program_reach_male) as male2'), 
			DB::raw('SUM(flok_program_reach_female) as female2'),


			DB::raw('SUM(local_community) as type3'),
			DB::raw('SUM(local_community_reach_male) as male3'), 
			DB::raw('SUM(local_community_reach_female) as female3'),

			DB::raw('SUM(cable_tv) as type4'),
			DB::raw('SUM(cable_tv_reach_male) as male4'),
			DB::raw('SUM(cable_tv_reach_female) as female4'),

			DB::raw('SUM(flash_mob) as type5'),
			DB::raw('SUM(flash_mob_reach_male) as male5'), 
			DB::raw('SUM(flash_mob_reach_female) as female5'),

			DB::raw('SUM(others) as type6'),
			DB::raw('SUM(others_reach_male) as male6'), 
			DB::raw('SUM(others_reach_female) as female6'))
		->where('user_id', $masschartvalue)
		->Where(function($query) use ($from_date, $to_date){
                $query->whereBetween('created_at', [$from_date, $to_date])
               			->orWhereDate('created_at', $from_date)
						->orWhereDate('created_at', $to_date);
            })
		->get();

		foreach($data as $key => $value){
			$value->male = (int)$value->male;
			$value->female = (int)$value->female;
			$value->male1 = (int)$value->male1;
			$value->female1 = (int)$value->female1;
			$value->male2 = (int)$value->male2;
			$value->female2 = (int)$value->female2;
			$value->male3 = (int)$value->male3;
			$value->female3 = (int)$value->female3;
			$value->male4 = (int)$value->male4;
			$value->female4 = (int)$value->female4;
			$value->male5 = (int)$value->male5;
			$value->female5 = (int)$value->female5;
			$value->male6 = (int)$value->male6;
			$value->female6 = (int)$value->female6;
			$data = (array) $value;
		}

		$result = array_chunk($data, 3, true);
		

		foreach($result as $key => $value){
			if($key == 0){
				$result[$key]['type'] = "RCV (".$result[$key]['type'].")";
			}
			if($key == 1){
				$result[$key]["type"] = "NN (".$result[$key]['type1'].")";
				$result[$key]["male"] = $result[$key]['male1'];
				$result[$key]["female"] = $result[$key]['female1'];
				unset($result[$key]["type1"]);
				unset($result[$key]['male1']);
				unset($result[$key]['female1']);
			}
			if($key == 2){
				$result[$key]["type"] = "FP (".$result[$key]['type2'].")";
				$result[$key]["male"] = $result[$key]['male2'];
				$result[$key]["female"] = $result[$key]['female2'];
				unset($result[$key]["type2"]);
				unset($result[$key]['male2']);
				unset($result[$key]['female2']);
			}
			if($key == 3){
				$result[$key]["type"] = "L/C R (".$result[$key]['type3'].")";
				$result[$key]["male"] = $result[$key]['male3'];
				$result[$key]["female"] = $result[$key]['female3'];
				unset($result[$key]["type3"]);
				unset($result[$key]['male3']);
				unset($result[$key]['female3']);
			}
			if($key == 4){
				$result[$key]["type"] = "TV/Cable TV (".$result[$key]['type4'].")";
				$result[$key]["male"] = $result[$key]['male4'];
				$result[$key]["female"] = $result[$key]['female4'];
				unset($result[$key]["type4"]);
				unset($result[$key]['male4']);
				unset($result[$key]['female4']);
			}
			if($key == 5){
				$result[$key]["type"] = "FM (".$result[$key]['type5'].")";
				$result[$key]["male"] = $result[$key]['male5'];
				$result[$key]["female"] = $result[$key]['female5'];
				unset($result[$key]["type5"]);
				unset($result[$key]['male5']);
				unset($result[$key]['female5']);
			}
			if($key == 6){
				$result[$key]["type"] = "Others (".$result[$key]['type6'].")";
				$result[$key]["male"] = $result[$key]['male6'];
				$result[$key]["female"] = $result[$key]['female6'];
				unset($result[$key]["type6"]);
				unset($result[$key]['male6']);
				unset($result[$key]['female6']);
			}
		}
	
		foreach($result as $key => $value){
			$result[$key] = (object) $result[$key];
		}	
		echo json_encode($result);
	}

	// public function groups_tracking_graph(Request $request){
	// 	$inputs = $request->all();
	// 	$from_date = date($inputs['start_date']);
	// 	$to_date = date($inputs['end_date']);
	// 	$group_select_value = $inputs['group_select_value'];
	// 	$data = DB::table('vulnerable_groups_tracking')
	// 	->select('user_id',DB::raw('SUM(no_nomadic_locations) as Nomadic_Locations'),
	// 		DB::raw('SUM(no_construction_labour_sites) as Construction_Labour_Sites'),
	// 		DB::raw('SUM(no_bricklin_labour_sites) as Bricklin_Labour_Sites'), 
	// 		DB::raw('SUM(no_mine_labour_sites) as Mine_Labour_Sites'),
	// 		DB::raw('SUM(no_excluded_groups_sites) as Excluded_Groups_Sites'), 
	// 		DB::raw('SUM(no_pastrol_community) as Pastrol_Community'),
	// 		DB::raw('SUM(no_slum_dwellers) as Slum_Dwellers'), 
	// 		DB::raw('SUM(no_sex_workers) as Sex_Workers'))
	// 	->where('user_id', $group_select_value)
	// 	->Where(function($query) use ($from_date, $to_date){
 //                $query->whereBetween('created_at', [$from_date, $to_date])
 //               			->orWhereDate('created_at', $from_date)
	// 					->orWhereDate('created_at', $to_date);
 //            })
	// 	->groupBy('user_id')
	// 	->get();
	// 	foreach($data as $key => $value){
	// 		$value->user_id = '';
	// 		$value->Nomadic_Locations = (int) $value->Nomadic_Locations;
	// 		$value->Construction_Labour_Sites = (int) $value->Construction_Labour_Sites;
	// 		$value->Bricklin_Labour_Sites = (int) $value->Bricklin_Labour_Sites;
	// 		$value->Mine_Labour_Sites = (int) $value->Mine_Labour_Sites;
	// 		$value->Excluded_Groups_Sites = (int) $value->Excluded_Groups_Sites;
	// 		$value->Pastrol_Community = (int) $value->Pastrol_Community;
	// 		$value->Slum_Dwellers = (int) $value->Slum_Dwellers;
	// 		$value->Sex_Workers = (int) $value->Sex_Workers;
	// 	}
	// 	echo json_encode($data);
	// }

	public function groups_tracking_graph(Request $request){
		$inputs = $request->all();
		$from_date = date($inputs['start_date']);
		$to_date = date($inputs['end_date']);
		$group_select_value = $inputs['group_select_value'];
		$data = DB::table('vulnerable_groups_tracking')
		->select(DB::raw('SUM(no_nomadic_locations) as Nomadic_Locations'),
			DB::raw('SUM(no_construction_labour_sites) as Construction_Labour_Sites'),
			DB::raw('SUM(no_bricklin_labour_sites) as Bricklin_Labour_Sites'), 
			DB::raw('SUM(no_mine_labour_sites) as Mine_Labour_Sites'),
			DB::raw('SUM(no_excluded_groups_sites) as Excluded_Groups_Sites'), 
			DB::raw('SUM(no_pastrol_community) as Pastrol_Community'),
			DB::raw('SUM(no_slum_dwellers) as Slum_Dwellers'), 
			DB::raw('SUM(no_sex_workers) as Sex_Workers'),
			DB::raw('SUM(hrg_tracked) as hrg_tracked')) 
		->where('user_id', $group_select_value)
		->Where(function($query) use ($from_date, $to_date){
                $query->whereBetween('created_at', [$from_date, $to_date])
               			->orWhereDate('created_at', $from_date)
						->orWhereDate('created_at', $to_date);
            })
		->groupBy('user_id')
		->get();

		foreach($data as $key => $value){
			$data = (array) $value;
		}

		$data = array_chunk($data, 1, true);
		foreach($data as $key => $value){
			if($key == 0){
				$data[$key]['field'] = (int) $data[$key]['Nomadic_Locations'];
				unset($data[$key]['Nomadic_Locations']);
				$data[$key]['type'] = 'Nomadic locations';
			}
			if($key == 1){
				$data[$key]['field'] = (int) $data[$key]['Construction_Labour_Sites'];
				unset($data[$key]['Construction_Labour_Sites']);
				$data[$key]['type'] = 'Construction Labour Sites';
			}
			if($key == 2){
				$data[$key]['field'] = (int) $data[$key]['Bricklin_Labour_Sites'];
				unset($data[$key]['Bricklin_Labour_Sites']);
				$data[$key]['type'] = 'Bricklin Labour Sites';
			}
			if($key == 3){
				$data[$key]['field'] = (int) $data[$key]['Mine_Labour_Sites'];
				unset($data[$key]['Mine_Labour_Sites']);
				$data[$key]['type'] = 'Mine Labour Sites';
			}
			if($key == 4){
				$data[$key]['field'] = (int) $data[$key]['Excluded_Groups_Sites'];
				unset($data[$key]['Excluded Groups Sites']);
				$data[$key]['type'] = 'Excluded Groups Sites';
			}
			if($key == 5){
				$data[$key]['field'] = (int) $data[$key]['Pastrol_Community'];
				unset($data[$key]['Pastrol_Community']);
					$data[$key]['type'] = 'Pastrol Community';
			}
			if($key == 6){
				$data[$key]['field'] = (int) $data[$key]['Slum_Dwellers'];
				unset($data[$key]['Slum_Dwellers']);
				$data[$key]['type'] = 'Slum Dwellers';
			}
			if($key == 7){
				$data[$key]['field'] = (int) $data[$key]['Sex_Workers'];
				unset($data[$key]['Sex_Workers']);
				$data[$key]['type'] = 'Sex Workers';
			}
			if($key == 8){
				$data[$key]['field'] = (int) $data[$key]['hrg_tracked'];
				unset($data[$key]['hrg_tracked']);
				$data[$key]['type'] = 'S/L of HRG tracked';
			}
			$data[$key]  = array_reverse($data[$key]);

		}
	
		echo json_encode($data);
	}

	public function performance_graph(Request $request){
		$inputs = $request->all();
		$from_date = date($inputs['start_date']);
		$to_date = date($inputs['end_date']);


		$userStates = DB::table('users')
			->select('districts')
        	->get();

	$data['PPSumDistricts']  = array();
	$data['SMSumDistricts']  = array();
	$data['OrientationSumDistricts']  = array();
	$data['PvtSumDistricts']  = array();
	$data['CoordinationSumDistricts']  = array();		
	$data['MassMediaSumDistricts']  = array();	
	$data['GroundHealthSumDistricts']  = array();
	$data['GroundTrackingSumDistricts']  = array();	
	$data['IecSumDistricts']  = array();	

	if(in_array('1', $inputs['checkbox_value'])){
		$table1 = DB::table('dhs_meeting')
			->join('users', 'dhs_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(wheather_meeting)+SUM(wheather_Consultant)+SUM(suggestions_Consultant) as column1'))->whereBetween('dhs_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('dhs_meeting.created_at', $from_date)
			->orWhereDate('dhs_meeting.created_at', $to_date)->groupBy('users.districts')->get()->toArray();
		$table2 = DB::table('sector_meeting')
			->join('users', 'sector_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings)+SUM(meetings_participated)+SUM(suggestions_consultan_description) as column1'))
			->whereBetween('sector_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sector_meeting.created_at', $from_date)
			->orWhereDate('sector_meeting.created_at', $to_date)->groupBy('users.districts')->get()->toArray();

		$table3 = DB::table('nigrani_samiti_meeting')
			->join('users', 'nigrani_samiti_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(wheather_meeting)+SUM(wheather_consultant_participated) as column1'))
			->whereBetween('nigrani_samiti_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('nigrani_samiti_meeting.created_at', $from_date)
			->orWhereDate('nigrani_samiti_meeting.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();


		foreach ($userStates as $loopkey => $value) {
			$key = array_search($value->districts,array_column($table1,'districts'));
			$data['PPSumDistricts'][$value->districts] = ($key != '' ? $table1[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table2,'districts'));
			$data['PPSumDistricts'][$value->districts] += ($key != '' ? $table2[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table3,'districts'));
			$data['PPSumDistricts'][$value->districts] += ($key != '' ? $table3[$key]->column1 : 0);
		}
	}
	
	if(in_array('2', $inputs['checkbox_value'])){	
		$table4 = DB::table('meeting_institutions_religious_leaders')
			->join('users', 'meeting_institutions_religious_leaders.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('meeting_institutions_religious_leaders.created_at', [$from_date, $to_date])
			->orWhereDate('meeting_institutions_religious_leaders.created_at', $from_date)
			->orWhereDate('meeting_institutions_religious_leaders.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();
			// dd($table1[0]->districts);

		$table5 = DB::table('sm_community_meeting')
			->join('users', 'sm_community_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('sm_community_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_community_meeting.created_at', $from_date)
			->orWhereDate('sm_community_meeting.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table6 = DB::table('sm_excluded_groups_meeting')
			->join('users', 'sm_excluded_groups_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('sm_excluded_groups_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_excluded_groups_meeting.created_at', $from_date)
			->orWhereDate('sm_excluded_groups_meeting.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table7 = DB::table('sm_ipc')
			->join('users', 'sm_ipc.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('sm_ipc.created_at', [$from_date, $to_date])
			->orWhereDate('sm_ipc.created_at', $from_date)
			->orWhereDate('sm_ipc.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table8 = DB::table('sm_meeting_influencers')
			->join('users', 'sm_meeting_influencers.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('sm_meeting_influencers.created_at', [$from_date, $to_date])
			->orWhereDate('sm_meeting_influencers.created_at', $from_date)
			->orWhereDate('sm_meeting_influencers.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table9 = DB::table('sm_mother_meeting')
			->join('users', 'sm_mother_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('sm_mother_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_mother_meeting.created_at', $from_date)
			->orWhereDate('sm_mother_meeting.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();


		$table10 = DB::table('sm_shg_member_meeting')
			->join('users', 'sm_shg_member_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('sm_shg_member_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_shg_member_meeting.created_at', $from_date)
			->orWhereDate('sm_shg_member_meeting.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table11 = DB::table('sm_volunteer_organization_meeting')
			->join('users', 'sm_volunteer_organization_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(nyks_number_meetings)+SUM(nss_number_meetings)+SUM(bsg_number_meetings) as column1'))
			->whereBetween('sm_volunteer_organization_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_volunteer_organization_meeting.created_at', $from_date)
			->orWhereDate('sm_volunteer_organization_meeting.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table12 = DB::table('sm_vulrenable_groups_meeting')
			->join('users', 'sm_vulrenable_groups_meeting.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_meetings) as column1'))
			->whereBetween('sm_vulrenable_groups_meeting.created_at', [$from_date, $to_date])
			->orWhereDate('sm_vulrenable_groups_meeting.created_at', $from_date)
			->orWhereDate('sm_vulrenable_groups_meeting.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		
		foreach ($userStates as $loopkey => $value) {
			$key = array_search($value->districts,array_column($table4,'districts'));
			$data['SMSumDistricts'][$value->districts] = ($key != '' ? $table4[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table5,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table5[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table6,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table6[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table7,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table7[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table8,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table8[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table9,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table9[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table10,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table10[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table11,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table11[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table12,'districts'));
			$data['SMSumDistricts'][$value->districts] += ($key != '' ? $table12[$key]->column1 : 0);
		}
	}
	if(in_array('3', $inputs['checkbox_value'])){
		$table13 = DB::table('orient_education_depart')
			->join('users', 'orient_education_depart.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_orientation) as column1'))
			->whereBetween('orient_education_depart.created_at', [$from_date, $to_date])
			->orWhereDate('orient_education_depart.created_at', $from_date)
			->orWhereDate('orient_education_depart.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();


		$table14 = DB::table('orient_panchayat_rural_devlopment')
			->join('users', 'orient_panchayat_rural_devlopment.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_orientation) as column1'))
			->whereBetween('orient_panchayat_rural_devlopment.created_at', [$from_date, $to_date])
			->orWhereDate('orient_panchayat_rural_devlopment.created_at', $from_date)
			->orWhereDate('orient_panchayat_rural_devlopment.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table15 = DB::table('orient_minority_dmwo_paratecher')
			->join('users', 'orient_minority_dmwo_paratecher.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_orientation) as column1'))
			->whereBetween('orient_minority_dmwo_paratecher.created_at', [$from_date, $to_date])
			->orWhereDate('orient_minority_dmwo_paratecher.created_at', $from_date)
			->orWhereDate('orient_minority_dmwo_paratecher.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table16 = DB::table('orient_ulb_department')
			->join('users', 'orient_ulb_department.user_id', '=', 'users.id')
			->select('users.districts', DB::raw('SUM(number_orientation) as column1'))
			->whereBetween('orient_ulb_department.created_at', [$from_date, $to_date])
			->orWhereDate('orient_ulb_department.created_at', $from_date)
			->orWhereDate('orient_ulb_department.created_at', $to_date)
			->groupBy('users.districts')->get()->toArray();

		$table17 = DB::table('orient_csr_department')
				->join('users', 'orient_csr_department.user_id', '=', 'users.id')
				->select('users.districts', DB::raw('SUM(number_orientation) as column1'))
				->whereBetween('orient_csr_department.created_at', [$from_date, $to_date])
				->orWhereDate('orient_csr_department.created_at', $from_date)
				->orWhereDate('orient_csr_department.created_at', $to_date)
				->groupBy('users.districts')->get()->toArray();

		foreach ($userStates as $loopkey => $value) {
			$key = array_search($value->districts,array_column($table13,'districts'));
			$data['OrientationSumDistricts'][$value->districts] = ($key != '' ? $table13[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table14,'districts'));
			$data['OrientationSumDistricts'][$value->districts] += ($key != '' ? $table14[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table15,'districts'));
			$data['OrientationSumDistricts'][$value->districts] += ($key != '' ? $table15[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table16,'districts'));
			$data['OrientationSumDistricts'][$value->districts] += ($key != '' ? $table16[$key]->column1 : 0);

			$key = array_search($value->districts,array_column($table17,'districts'));
			$data['OrientationSumDistricts'][$value->districts] += ($key != '' ? $table17[$key]->column1 : 0);
		}
	}

	if(in_array('4', $inputs['checkbox_value'])){
		$table18 = DB::table('private_practitionerst_meeting')
					->join('users', 'private_practitionerst_meeting.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(number_meeting) as column1'))
					->whereBetween('private_practitionerst_meeting.created_at', [$from_date, $to_date])
					->orWhereDate('private_practitionerst_meeting.created_at', $from_date)
					->orWhereDate('private_practitionerst_meeting.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		$table19 = DB::table('pvt_ima_iap_meeting')
					->join('users', 'pvt_ima_iap_meeting.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(number_meeting) as column1'))
					->whereBetween('pvt_ima_iap_meeting.created_at', [$from_date, $to_date])
					->orWhereDate('pvt_ima_iap_meeting.created_at', $from_date)
					->orWhereDate('pvt_ima_iap_meeting.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		$table20 = DB::table('pvt_merchant_associations_meeting')
					->join('users', 'pvt_merchant_associations_meeting.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(number_meeting) as column1'))
					->whereBetween('pvt_merchant_associations_meeting.created_at', [$from_date, $to_date])
					->orWhereDate('pvt_merchant_associations_meeting.created_at', $from_date)
					->orWhereDate('pvt_merchant_associations_meeting.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		$table21 = 	DB::table('pvt_others_meeting')
					->join('users', 'pvt_others_meeting.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(number_meeting) as column1'))
					->whereBetween('pvt_others_meeting.created_at', [$from_date, $to_date])
					->orWhereDate('pvt_others_meeting.created_at', $from_date)
					->orWhereDate('pvt_others_meeting.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		$table22 = 	DB::table('pvt_pharmacists_associations_meeting')
					->join('users', 'pvt_pharmacists_associations_meeting.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(number_meeting) as column1'))
					->whereBetween('pvt_pharmacists_associations_meeting.created_at', [$from_date, $to_date])
					->orWhereDate('pvt_pharmacists_associations_meeting.created_at', $from_date)
					->orWhereDate('pvt_pharmacists_associations_meeting.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	


		foreach ($userStates as $loopkey => $value) {
				$key = array_search($value->districts,array_column($table18,'districts'));
				$data['PvtSumDistricts'][$value->districts] = ($key != '' ? $table18[$key]->column1 : 0);

				$key = array_search($value->districts,array_column($table19,'districts'));
				$data['PvtSumDistricts'][$value->districts] += ($key != '' ? $table19[$key]->column1 : 0);

				$key = array_search($value->districts,array_column($table20,'districts'));
				$data['PvtSumDistricts'][$value->districts] += ($key != '' ? $table20[$key]->column1 : 0);

				$key = array_search($value->districts,array_column($table21,'districts'));
				$data['PvtSumDistricts'][$value->districts] += ($key != '' ? $table21[$key]->column1 : 0);

				$key = array_search($value->districts,array_column($table22,'districts'));
				$data['PvtSumDistricts'][$value->districts] += ($key != '' ? $table22[$key]->column1 : 0);
			}
	}

	if(in_array('5', $inputs['checkbox_value'])){
		$table23 = 	DB::table('coordination_line_dept_meeting')
					->join('users', 'coordination_line_dept_meeting.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(panchayti_rural_development)+SUM(icds)+SUM(education)+SUM(srlm)+SUM(tribal_area)+SUM(dmwo) as column1'))
					->whereBetween('coordination_line_dept_meeting.created_at', [$from_date, $to_date])
					->orWhereDate('coordination_line_dept_meeting.created_at', $from_date)
					->orWhereDate('coordination_line_dept_meeting.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		foreach ($userStates as $loopkey => $value) {
				$key = array_search($value->districts,array_column($table23,'districts'));
				$data['CoordinationSumDistricts'][$value->districts] = ($key != '' ? $table23[$key]->column1 : 0);
			}
	}

	if(in_array('6', $inputs['checkbox_value'])){	
		$table24 = 	DB::table('mass_media_mid_media')
					->join('users', 'mass_media_mid_media.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(rally_covid_vaccination)+SUM(nukad_natak)+SUM(flok_program)+SUM(local_community)+SUM(cable_tv)+SUM(flash_mob)+SUM(others) as column1'))
					->whereBetween('mass_media_mid_media.created_at', [$from_date, $to_date])
					->orWhereDate('mass_media_mid_media.created_at', $from_date)
					->orWhereDate('mass_media_mid_media.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		foreach ($userStates as $loopkey => $value) {
				$key = array_search($value->districts,array_column($table24,'districts'));
				$data['MassMediaSumDistricts'][$value->districts] = ($key != '' ? $table24[$key]->column1 : 0);
			}
	}


	if(in_array('7', $inputs['checkbox_value'])){	
		$table25 = 	DB::table('ground_level_health')
					->join('users', 'ground_level_health.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(number_orientation) as column1'))
					->whereBetween('ground_level_health.created_at', [$from_date, $to_date])
					->orWhereDate('ground_level_health.created_at', $from_date)
					->orWhereDate('ground_level_health.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		foreach ($userStates as $loopkey => $value) {
				$key = array_search($value->districts,array_column($table25,'districts'));
				$data['GroundHealthSumDistricts'][$value->districts] = ($key != '' ? $table25[$key]->column1 : 0);
			}
	}

	if(in_array('8', $inputs['checkbox_value'])){	
		$table26 = 	DB::table('vulnerable_groups_tracking')
					->join('users', 'vulnerable_groups_tracking.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(no_nomadic_locations)+SUM(no_construction_labour_sites)+SUM(no_bricklin_labour_sites)+SUM(no_mine_labour_sites)+SUM(no_excluded_groups_sites)+SUM(no_pastrol_community)+SUM(no_slum_dwellers)+SUM(no_sex_workers)+SUM(hrg_tracked) as column1'))
					->whereBetween('vulnerable_groups_tracking.created_at', [$from_date, $to_date])
					->orWhereDate('vulnerable_groups_tracking.created_at', $from_date)
					->orWhereDate('vulnerable_groups_tracking.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		foreach ($userStates as $loopkey => $value) {
				$key = array_search($value->districts,array_column($table26,'districts'));
				$data['GroundTrackingSumDistricts'][$value->districts] = ($key != '' ? $table26[$key]->column1 : 0);
			}
	}

	if(in_array('9', $inputs['checkbox_value'])){	
		$table27 = 	DB::table('iec_iec_material')
					->join('users', 'iec_iec_material.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(posters)+SUM(banners)+SUM(ffl)+SUM(leaflet) as column1'))
					->whereBetween('iec_iec_material.created_at', [$from_date, $to_date])
					->orWhereDate('iec_iec_material.created_at', $from_date)
					->orWhereDate('iec_iec_material.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		$table28 = 	DB::table('iec_local_iec')
					->join('users', 'iec_local_iec.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(posters)+SUM(banners)+SUM(audio_clip)+SUM(video_clip)+SUM(jingles) as column1'))
					->whereBetween('iec_local_iec.created_at', [$from_date, $to_date])
					->orWhereDate('iec_local_iec.created_at', $from_date)
					->orWhereDate('iec_local_iec.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		$table29 = 	DB::table('iec_special_iec')
					->join('users', 'iec_special_iec.user_id', '=', 'users.id')
					->select('users.districts', DB::raw('SUM(posters)+SUM(banners)+SUM(leaflet)+SUM(others) as column1'))
					->whereBetween('iec_special_iec.created_at', [$from_date, $to_date])
					->orWhereDate('iec_special_iec.created_at', $from_date)
					->orWhereDate('iec_special_iec.created_at', $to_date)
					->groupBy('users.districts')->get()->toArray();	

		foreach ($userStates as $loopkey => $value) {
				$key = array_search($value->districts,array_column($table27,'districts'));
				$data['IecSumDistricts'][$value->districts] = ($key != '' ? $table27[$key]->column1 : 0);

				$key = array_search($value->districts,array_column($table28,'districts'));
				$data['IecSumDistricts'][$value->districts] += ($key != '' ? $table28[$key]->column1 : 0);

				$key = array_search($value->districts,array_column($table29,'districts'));
				$data['IecSumDistricts'][$value->districts] += ($key != '' ? $table29[$key]->column1 : 0);
			}
	}
	$data['AllDistrict'] = $userStates;
		echo json_encode($data);
	}
	public function monthwise_sum(Request $request){
		$inputs = $request->all();
		$current_year = date('Y');

		foreach($inputs['months_value'] as $key => $value){
			$SmSum1 = SmExcludedGroups::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum2 = SmMeetingCommunity::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum3 = SmMeetingInfluencer::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum4 = SmMeetingInstitutionsReligious::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_Female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum5 = SmMeetingIpc::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum6 = SmMeetingMother::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum7 = SmMeetingShg::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum8 = SmMeetingVulrenable::select(DB::raw('SUM(number_participants_male)+SUM(number_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$SmSum9 = SmVolunteerMeeting::select(DB::raw('SUM(nyks_participants_male)+SUM(nyks_participants_female)+SUM(nss_participants_male)+SUM(nss_participants_female)+SUM(bsg_participants_male)+SUM(bsg_participants_female) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			
			$sumdata['SmSumArray'][$key] = $SmSum1->total + $SmSum2->total+ $SmSum3->total+ $SmSum4->total+ $SmSum5->total+ $SmSum6->total+ $SmSum7->total+ $SmSum8->total+ $SmSum9->total;


			$MmSum= MassMedia::select(DB::raw('SUM(rally_covid_reach_male)+SUM(rally_covid_reach_female)+SUM(nukad_natak_reach_male)+SUM(nukad_natak_reach_female)+SUM(flok_program_reach_male)+SUM(flok_program_reach_female)+SUM(local_community_reach_male)+SUM(local_community_reach_female)+SUM(cable_tv_reach_male)+SUM(cable_tv_reach_female)+SUM(flash_mob_reach_male)+SUM(flash_mob_reach_female)+SUM(others_reach_male)+SUM(others_reach_female)  as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();
			
			$sumdata['MassSumArray'][$key] = $MmSum->total;

			$PvtSum1 = MeetingIMA::select(DB::raw('SUM(number_participants) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$PvtSum2 = MeetingPractitioners::select(DB::raw('SUM(number_participants) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$PvtSum3 = MerchantAssociation::select(DB::raw('SUM(number_participants) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$PvtSum4 = Others::select(DB::raw('SUM(number_participants) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	
			$PvtSum5 = PharmacistsAssociations::select(DB::raw('SUM(number_participants) as total'))->whereMonth('created_at', $value)->whereYear('created_at', $current_year)->first();	

			$sumdata['PvtSumArray'][$key] = $PvtSum1->total + $PvtSum2->total + $PvtSum3->total + $PvtSum4->total + $PvtSum5->total;
		}
			$data['SmSum'] = array_sum($sumdata['SmSumArray']);
			$data['MassMediaSum'] = array_sum($sumdata['MassSumArray']);
			$data['PvtSum'] = array_sum($sumdata['PvtSumArray']);
			echo json_encode($data);
	}

	public function iec_graph(Request $request){
		$inputs = $request->input();
		$from_date = date($inputs['start_date']);
		$to_date = date($inputs['end_date']);
		$iec_district_id = $inputs['iec_district_id'];
		$iec_table_value = $inputs['iec_table_name'];

		if($iec_table_value == 1){
			$data = DB::table('iec_iec_material')
			->select(DB::raw('SUM(posters) as posters'), DB::raw('SUM(banners) as banners'), DB::raw('SUM(ffl) as ffl'), DB::raw('SUM(leaflet) as leaflet'))
			->where('user_id', $iec_district_id)
			->Where(function($query) use ($from_date, $to_date){
                $query->whereBetween('created_at', [$from_date, $to_date])
               			->orWhereDate('created_at', $from_date)
						->orWhereDate('created_at', $to_date);
            })
			->get();
			foreach($data as $key => $value){
				$data = (array) $value;
				$data = array_chunk($data, 1, true);
			}
			$array = array();
			foreach($data as $key => $value){
				$array[$key]['value'] = array_values($value);
				$array[$key]['value'] = (int) implode(" ",$array[$key]['value']);
				$array[$key]['category'] = array_keys($value);
				$array[$key]['category'] = implode(" ",$array[$key]['category']);
			}	
		}

		if($iec_table_value == 2){
			$data = DB::table('iec_local_iec')
			->select(DB::raw('SUM(posters) as posters'), DB::raw('SUM(banners) as banners'), DB::raw('SUM(audio_clip) as audio_clip'), DB::raw('SUM(video_clip) as video_clip'), DB::raw('SUM(jingles) as jingles'))
			->where('user_id', $iec_district_id)
			->Where(function($query) use ($from_date, $to_date){
                $query->whereBetween('created_at', [$from_date, $to_date])
               			->orWhereDate('created_at', $from_date)
						->orWhereDate('created_at', $to_date);
            })
			->get();
			foreach($data as $key => $value){
				$data = (array) $value;
				$data = array_chunk($data, 1, true);
			}
			$array = array();
			foreach($data as $key => $value){
				$array[$key]['value'] = array_values($value);
				$array[$key]['value'] = (int) implode(" ",$array[$key]['value']);
				$array[$key]['category'] = array_keys($value);
				$array[$key]['category'] = implode(" ",$array[$key]['category']);
			}
		}

		if($iec_table_value == 3){
			$data = DB::table('iec_special_iec')
			->select(DB::raw('SUM(posters) as posters'), DB::raw('SUM(banners) as banners'), DB::raw('SUM(leaflet) as leaflet'), DB::raw('SUM(others) as others'))
			->where('user_id', $iec_district_id)
			->Where(function($query) use ($from_date, $to_date){
                $query->whereBetween('created_at', [$from_date, $to_date])
               			->orWhereDate('created_at', $from_date)
						->orWhereDate('created_at', $to_date);
            })
			->get();
			foreach($data as $key => $value){
				$data = (array) $value;
				$data = array_chunk($data, 1, true);
			}
			$array = array();
			foreach($data as $key => $value){
				$array[$key]['value'] = array_values($value);
				$array[$key]['value'] = (int) implode(" ",$array[$key]['value']);
				$array[$key]['category'] = array_keys($value);
				$array[$key]['category'] = implode(" ",$array[$key]['category']);
			}
		}

		echo json_encode($array);
	}
}

