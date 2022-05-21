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


use Auth;
use Str;
use Validator;
use Hash;
use DB;

class DashboardController extends Controller
{
	public function index()
	{
		// DB::getQueryLog();
		// $data = SmMeetingInstitutionsReligious::with('Alldeta')->select('user_id','number_meetings','number_participants_male','number_participants_Female')->get()->sum('number_meetings','number_participants_male','number_participants_Female')->groupBy('districts');
		// dd(DB::getQueryLog());
		$districts['districts'] = User::orderBy('districts', 'Asc')->get();
		return view('admin/dashboard/dashboard', $districts);	
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
				$data = Planing::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select('user_id','wheather_meeting as condition')->limit(18)->get();
			}else if($chartvaluenumber == 2){
				$data = Planing::whereDate('created_at',$date)->with('all_data')->select('user_id','wheather_Consultant as condition')->limit(18)->get();
			}else if($chartvaluenumber == 3) {
				$data = Planing::whereDate('created_at',$date)->with('all_data')->select('user_id','suggestions_Consultant as condition')->limit(18)->get();
			}else if($chartvaluenumber == 4) {
				$data = NigraniSamitiMeeting::whereDate('created_at',$date)->with('all_data')->select('user_id','wheather_meeting as condition')->limit(18)->get();
			}else if($chartvaluenumber == 5) {
				$data = NigraniSamitiMeeting::whereDate('created_at',$date)->with('all_data')->select('user_id','wheather_consultant_participated as condition')->limit(18)->get();
			}else if($chartvaluenumber == 6) {
				$data = DistrictCommunication::whereDate('created_at',$date)->with('all_data')->select('user_id','wheather_developed as condition')->limit(18)->get();
			}else if($chartvaluenumber == 7) {
				$data = FortnightlyReport::whereDate('created_at',$date)->with('all_data')->select('user_id','first_fortnighly_report as condition')->limit(18)->get();
			}else if($chartvaluenumber == 8) {
				$data = FortnightlyReport::whereDate('created_at',$date)->with('all_data')->select('user_id','second_fortnighly_report as condition')->limit(18)->get();
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
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select('user_id','panchayti_rural_development as condition')->limit(18)->get();
		}
		if($coordinationchartvalue == 2) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select('user_id','icds as condition')->limit(18)->get();
		}
		if($coordinationchartvalue == 3) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select('user_id','education as condition')->limit(18)->get();
		}
		if($coordinationchartvalue == 4) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select('user_id','srlm as condition')->limit(18)->get();
		}
		if($coordinationchartvalue == 5) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select('user_id','tribal_area as condition')->limit(18)->get();
		}
		if($coordinationchartvalue == 6) {
			$data = Coordination::whereBetween('created_at', [$from_date, $to_date])->orWhereDate('created_at',$from_date)->orWhereDate('created_at',$to_date)->with('all_data')->select('user_id','dmwo as condition')->limit(18)->get();
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
		->select(DB::raw('SUM(rally_covid_reach_male) as male'),
			DB::raw('SUM(rally_covid_reach_female) as female'),
			DB::raw('SUM(nukad_natak_reach_male) as male1'), 
			DB::raw('SUM(nukad_natak_reach_female) as female1'),
			DB::raw('SUM(flok_program_reach_male) as male2'), 
			DB::raw('SUM(flok_program_reach_female) as female2'),
			DB::raw('SUM(local_community_reach_male) as male3'), 
			DB::raw('SUM(local_community_reach_female) as female3'),
			DB::raw('SUM(cable_tv_reach_male) as male4'),
			DB::raw('SUM(cable_tv_reach_female) as female4'),
			DB::raw('SUM(flash_mob_reach_male) as male5'), 
			DB::raw('SUM(flash_mob_reach_female) as female5'),
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
		$result = array_chunk($data, 2, true);
		foreach($result as $key => $value){
			if($key == 0){
				$result[$key]['type'] = "Rally Covid Vaccination";
				$result[$key] = array_reverse($result[$key]);
			}
			if($key == 1){
				$result[$key]["type"] = "Nukad Natak";
				$result[$key]["male"] = $result[$key]['male1'];
				$result[$key]["female"] = $result[$key]['female1'];
				unset($result[$key]['male1']);
				unset($result[$key]['female1']);
			}
			if($key == 2){
				$result[$key]["type"] = "Flok Program";
				$result[$key]["male"] = $result[$key]['male2'];
				$result[$key]["female"] = $result[$key]['female2'];
				unset($result[$key]['male2']);
				unset($result[$key]['female2']);
			}
			if($key == 3){
				$result[$key]["type"] = "Local/Community Radio";
				$result[$key]["male"] = $result[$key]['male3'];
				$result[$key]["female"] = $result[$key]['female3'];
				unset($result[$key]['male3']);
				unset($result[$key]['female3']);
			}
			if($key == 4){
				$result[$key]["type"] = "TV/Cable TV";
				$result[$key]["male"] = $result[$key]['male4'];
				$result[$key]["female"] = $result[$key]['female4'];
				unset($result[$key]['male4']);
				unset($result[$key]['female4']);
			}
			if($key == 5){
				$result[$key]["type"] = "Flash Mob";
				$result[$key]["male"] = $result[$key]['male5'];
				$result[$key]["female"] = $result[$key]['female5'];
				unset($result[$key]['male5']);
				unset($result[$key]['female5']);
			}
			if($key == 6){
				$result[$key]["type"] = "Others";
				$result[$key]["male"] = $result[$key]['male6'];
				$result[$key]["female"] = $result[$key]['female6'];
				unset($result[$key]['male6']);
				unset($result[$key]['female6']);
			}
		}
		foreach($result as $key => $value){
			$result[$key] = (object) $result[$key];
		}	
		echo json_encode($result);
	}

	public function groups_tracking_graph(Request $request){
		$inputs = $request->all();
		$from_date = date($inputs['start_date']);
		$to_date = date($inputs['end_date']);
		$group_select_value = $inputs['group_select_value'];
		$data = DB::table('vulnerable_groups_tracking')
		->select('user_id',DB::raw('SUM(no_nomadic_locations) as Nomadic_Locations'),
			DB::raw('SUM(no_construction_labour_sites) as Construction_Labour_Sites'),
			DB::raw('SUM(no_bricklin_labour_sites) as Bricklin_Labour_Sites'), 
			DB::raw('SUM(no_mine_labour_sites) as Mine_Labour_Sites'),
			DB::raw('SUM(no_excluded_groups_sites) as Excluded_Groups_Sites'), 
			DB::raw('SUM(no_pastrol_community) as Pastrol_Community'),
			DB::raw('SUM(no_slum_dwellers) as Slum_Dwellers'), 
			DB::raw('SUM(no_sex_workers) as Sex_Workers'))
		->where('user_id', $group_select_value)
		->Where(function($query) use ($from_date, $to_date){
                $query->whereBetween('created_at', [$from_date, $to_date])
               			->orWhereDate('created_at', $from_date)
						->orWhereDate('created_at', $to_date);
            })
		->groupBy('user_id')
		->get();

		foreach($data as $key => $value){
			$value->user_id = '';
			$value->Nomadic_Locations = (int) $value->Nomadic_Locations;
			$value->Construction_Labour_Sites = (int) $value->Construction_Labour_Sites;
			$value->Bricklin_Labour_Sites = (int) $value->Bricklin_Labour_Sites;
			$value->Mine_Labour_Sites = (int) $value->Mine_Labour_Sites;
			$value->Excluded_Groups_Sites = (int) $value->Excluded_Groups_Sites;
			$value->Pastrol_Community = (int) $value->Pastrol_Community;
			$value->Slum_Dwellers = (int) $value->Slum_Dwellers;
			$value->Sex_Workers = (int) $value->Sex_Workers;
		}

		echo json_encode($data);
	}
}
