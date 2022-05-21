<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PlaningPlatform\Planing;
use App\Models\PlaningPlatform\SectorMeeting;
use App\Models\PlaningPlatform\NigraniSamitiMeeting;
use App\Models\PlaningPlatform\DistrictCommunication;
use App\Models\PlaningPlatform\FortnightlyReport;
use Auth;
use Validator;
use Str;

class PlaningPlatform extends Controller
{
	public function Planing_Platform(){
		$user_id = Auth::id();
	    $today_date = date('Y-m-d');

	    $data['PlaningCount'] = Planing::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['PlaningData'] = Planing::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	    if($data['PlaningCount'] == 1){
	    	$data['line_departments'] = json_decode($data['PlaningData']['line_departments_meeting']);
	    }
	   
	    $data['SectorMeetingCount'] = SectorMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['SectorMeetingData'] = SectorMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

	    $data['NigraniSamitiMeetingCount'] = NigraniSamitiMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['NigraniSamitiMeetingData'] = NigraniSamitiMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

	    $data['DistrictCommunicationCount'] = DistrictCommunication::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['DistrictCommunicationData'] = DistrictCommunication::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

	    $data['FortnightlyReportCount'] = FortnightlyReport::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['FortnightlyReportData'] = FortnightlyReport::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

		return view ('admin/Planing_Platform', $data);
	}
	
	public function planing_platform_save(Request $request){
			$inputs = $request->all();
			// dd($inputs);
			$validator = Validator::make($request->all(),[
				'wheather_meeting'        => 'required',
				'line_departments_meeting' => 'required',
				'wheather_consultant'  => 'required',
				'suggestions_consultant'  => 'required',
				'provided_description'   => 'required',
				'other_meeting.*' => 'required_unless:line_departments_meeting[0],Other',
			],[
				'other_meeting.*.required_unless'=>'Other meeting field is required',
			 ]);
			 if ($validator->fails()) {
			 	return redirect()->back()->withErrors($validator)->withinput();
			 }

			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	    	$rowcount = Planing::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    	if($rowcount == 0){
				$dhs_meeting = new Planing;
	    	}elseif($rowcount == 1){
	    		$rowid = Planing::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	    		$dhs_meeting = Planing::find($rowid['id']);
	    	}
			$dhs_meeting->wheather_meeting = $inputs['wheather_meeting']; 
			$dhs_meeting->cate_name = 'Planing Platform';
			$dhs_meeting->user_id = $user_id;

			if($inputs['line_departments_meeting'][0] == 'Other'){
				$json = array_merge($inputs['line_departments_meeting'],$inputs['other_meeting']);
				$json_encode = json_encode($json);
				$dhs_meeting->line_departments_meeting = $json_encode; 

			}else{

				$line_departments_meetings = json_encode($inputs['line_departments_meeting']);
				$dhs_meeting->line_departments_meeting = $line_departments_meetings;
			}
			$dhs_meeting->wheather_consultant = $inputs['wheather_consultant']; 
			$dhs_meeting->suggestions_consultant = $inputs['suggestions_consultant']; 
			$dhs_meeting->provided_description = $inputs['provided_description']; 

			if($_FILES['image_upload']['name'] != ''){
				$img_name  = time() . '-' . Str::of(md5(time() . $request->file('image_upload')->hashName()))->substr(0, 50) . '.' . $request->file('image_upload')->extension();
				$path = $request->file('image_upload')->move(public_path('DTF_DHS_Meeting'), $img_name);
				$dhs_meeting->file = $img_name;
	   		}
	   		elseif($inputs['for_old_value'] != ''){
	   			$temp_name = time() . '-' . Str::of(md5(time())) . str::random(5) . '.' . "jpg";
	   			$img_name = $inputs['for_old_value'];
	   			$img_name = str_replace('data:image/png;base64,', '', $img_name);
	   			$img_name = str_replace('data:image/jpeg;base64,', '', $img_name);
	   			$img_name = str_replace('data:image/jpg;base64,', '', $img_name);
                $img_name = str_replace(' ', '+', $img_name);
                $data = base64_decode($img_name);
                file_put_contents('public/DTF_DHS_Meeting/'.$temp_name, $data);
                $dhs_meeting->file = $temp_name;
	   		}	


			if($dhs_meeting->save()) {
				if($rowcount == 0){
					return back()->with('flash-success', 'Planing platform added successfully');
		    	}elseif($rowcount == 1){
					return back()->with('flash-update', 'Planing platform update successfully');
		    	}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}

	public function sector_meeting(Request $request)
	{
    		$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'total_district'        => 'required',
				'number_meetings' => 'required',
				'meetings_participated'  => 'required',
				'suggestions_consultan_description'  => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'sector_meeting')->withinput();
			}

			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	   		$rowcount = SectorMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	   		if($rowcount == 0){
				$sector_meeting = new SectorMeeting;
	   		}elseif($rowcount == 1){
	   			$rowid = SectorMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	   			$sector_meeting = SectorMeeting::find($rowid['id']);
	   		}
			$sector_meeting->total_district = $inputs['total_district']; 
			$sector_meeting->cate_name = 'Planing Platform';
			$sector_meeting->user_id = $user_id;
			$sector_meeting->number_meetings = $inputs['number_meetings']; 
			$sector_meeting->meetings_participated = $inputs['meetings_participated']; 
			$sector_meeting->suggestions_consultan_description = $inputs['suggestions_consultan_description']; 
			if($sector_meeting->save()) {
				if($rowcount == 0){
					return back()->with('flash-success', 'Sector  added successfully')->with('sector-meeting', 'sector-meeting');
		   		}elseif($rowcount == 1){
		   			return back()->with('flash-update', 'Sector  update successfully')->with('sector-meeting', 'sector-meeting');
		   		}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}



	public function nigrani_samiti_meeting(Request $request)
	{
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'wheather_meeting'        => 'required',
				'wheather_consultant_participated' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'samiti_meeting')->withinput();
			}

			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	    	$rowcount = NigraniSamitiMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    	if($rowcount == 0){
				$nigrani_samiti_meeting = new NigraniSamitiMeeting;
	    	}elseif($rowcount == 1){
	    		$rowid = NigraniSamitiMeeting::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
				$nigrani_samiti_meeting = NigraniSamitiMeeting::find($rowid['id']);
	    	}
			$nigrani_samiti_meeting->cate_name = 'Planing Platform';
			$nigrani_samiti_meeting->user_id = $user_id;
			$nigrani_samiti_meeting->wheather_meeting = $inputs['wheather_meeting']; 
			$nigrani_samiti_meeting->wheather_consultant_participated = $inputs['wheather_consultant_participated'];  
			if($nigrani_samiti_meeting->save()) {
				if($rowcount == 0){
					return back()->with('flash-success', 'Nigrani samiti meeting platform added successfully')->with('nagni-samiti', 'nagni-samiti');
	    		}elseif($rowcount == 1){
					return back()->with('flash-update', 'Nigrani samiti meeting platform update successfully')->with('nagni-samiti', 'nagni-samiti');
	    		}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}

	public function district_communication(Request $request)
	{
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'wheather_developed'  => 'required',
				'If_yes_month' => 'required_if:wheather_developed, 1|prohibited_if:wheather_developed, 0',
			],[
				'If_yes_month.required_if' => 'The month field is required when you choose Yes',
				'If_yes_month.prohibited_if' => 'You cannot select month beacause you choose No',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'district_communication')->withinput();
			}
			
			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	   		$rowcount = DistrictCommunication::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	   		if($rowcount == 0){
				$nigrani_samiti_meeting = new DistrictCommunication;
	   		}elseif($rowcount == 1){
	   			$rowid = DistrictCommunication::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	   			$nigrani_samiti_meeting = DistrictCommunication::find($rowid['id']);
	   		}

			$nigrani_samiti_meeting->cate_name = 'Planing Platform';
			$nigrani_samiti_meeting->user_id = $user_id;
			$nigrani_samiti_meeting->wheather_developed = $inputs['wheather_developed']; 
			if($inputs['wheather_developed'] == 1){
				$nigrani_samiti_meeting->If_yes_month = $inputs['If_yes_month']; 	
			}elseif($inputs['wheather_developed'] == 0){
				$nigrani_samiti_meeting->If_yes_month = NULL; 
			}

			if ($nigrani_samiti_meeting->save()) {
				if($rowcount == 0){
					return back()->with('flash-success', 'District communication plan availability added successfully')->with('district-communication', 'district-communication');
		   		}elseif($rowcount == 1){
		   			return back()->with('flash-update', 'District communication plan availability update successfully')->with('district-communication', 'district-communication');
		   		}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}

	public function fortnightly_implementation(Request $request)
	{
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'first_fortnighly_report' => 'required',
			'second_fortnighly_report'        => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator,'fortnightly_implementation')->withinput();
		}
		$user_id = Auth::id();
    	$today_date = date('Y-m-d');
    	$rowcount = FortnightlyReport::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    	if($rowcount == 0){
			$fortnighly_report = new FortnightlyReport;
    	}elseif($rowcount == 1){
    		$rowid = FortnightlyReport::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
    		$fortnighly_report = FortnightlyReport::find($rowid['id']);
    	}
		$fortnighly_report->cate_name = 'Planing Platform';
		$fortnighly_report->user_id = $user_id;
		$fortnighly_report->first_fortnighly_report = $inputs['first_fortnighly_report'];  
		$fortnighly_report->second_fortnighly_report = $inputs['second_fortnighly_report'];
		if ($fortnighly_report->save()) {
			if($rowcount == 0){
				return back()->with('flash-success', 'fortnightly implementation report  added successfully')->with('fortnightly-implementation', 'fortnightly-implementation');
	    	}elseif($rowcount == 1){
	    		return back()->with('flash-update', 'fortnightly implementation report  update successfully')->with('fortnightly-implementation', 'fortnightly-implementation');
	    	}

		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		}
	}
}
