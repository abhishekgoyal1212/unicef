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

class PlaningPlatform extends Controller
{
	public function planing_platform_save(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		 $validator = Validator::make($request->all(),[
			'wheather_meeting'        => 'required',
			'line_departments_meeting' => 'required',
			'wheather_consultant'  => 'required',
			'suggestions_consultant'  => 'required',
			'provided_description'       => 'required',
		]);
		 if ($validator->fails()) {
		 	return redirect()->back()->withErrors($validator)->withinput();
		 }
		$dhs_meeting = new Planing;
		$dhs_meeting->wheather_meeting = $inputs['wheather_meeting']; 
		$dhs_meeting->cate_name = 'Planing Platform';
		$dhs_meeting->user_id = $user_id;
		$dhs_meeting->line_departments_meeting = $inputs['line_departments_meeting']; 
		$dhs_meeting->wheather_consultant = $inputs['wheather_consultant']; 
		$dhs_meeting->suggestions_consultant = $inputs['suggestions_consultant']; 
		$dhs_meeting->provided_description = $inputs['provided_description']; 

		if ($dhs_meeting->save()) {
			return back()->with('flash-success', 'Planing platform added successfully');
		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		}
	}
	

	public function sector_meeting(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'total_district'        => 'required',
			'number_meetings' => 'required',
			'meetings_participated'  => 'required',
			'suggestions_consultan_description'  => 'required',
		]);
		if ($validator->fails()) {
			// return redirect()->route('admin.sectorMeeting')->withErrors($validator)->withinput();
			return redirect()->back()->withErrors($validator,'sector_meeting')->withinput();
		}
		$sector_meeting = new SectorMeeting;
		$sector_meeting->total_district = $inputs['total_district']; 
		$sector_meeting->cate_name = 'Planing Platform';
		$sector_meeting->user_id = $user_id;

		$sector_meeting->number_meetings = $inputs['number_meetings']; 
		$sector_meeting->meetings_participated = $inputs['meetings_participated']; 
		$sector_meeting->suggestions_consultan_description = $inputs['suggestions_consultan_description']; 
		if ($sector_meeting->save()) {
			return back()->with('flash-success', 'Sector  added successfully');

		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		}
	}



	public function nigrani_samiti_meeting(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'wheather_meeting'        => 'required',
			'wheather_consultant_participated' => 'required',
		]);
		if ($validator->fails()) {
			// return redirect()->route('admin.sectorMeeting')->withErrors($validator)->withinput();
			return redirect()->back()->withErrors($validator,'samiti_meeting')->withinput();
		}

		$nigrani_samiti_meeting = new NigraniSamitiMeeting;
		$nigrani_samiti_meeting->cate_name = 'Planing Platform';
		$nigrani_samiti_meeting->user_id = $user_id;

		$nigrani_samiti_meeting->wheather_meeting = $inputs['wheather_meeting']; 
		$nigrani_samiti_meeting->wheather_consultant_participated = $inputs['wheather_consultant_participated'];  
		if ($nigrani_samiti_meeting->save()) {
			return back()->with('flash-success', 'Nigrani samiti meeting platform added successfully');

		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		}
	}

	public function district_communication(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'wheather_developed'        => 'required',
			'If_yes_month' => 'required',
		],[
			'If_yes_month.required' => 'The month field is required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator,'district_communication')->withinput();
		}
		$nigrani_samiti_meeting = new DistrictCommunication;
		$nigrani_samiti_meeting->cate_name = 'Planing Platform';
		$nigrani_samiti_meeting->user_id = $user_id;

		$nigrani_samiti_meeting->wheather_developed = $inputs['wheather_developed'];  
		$nigrani_samiti_meeting->If_yes_month = $inputs['If_yes_month']; 
		// dd($nigrani_samiti_meeting);
		if ($nigrani_samiti_meeting->save()) {
			return back()->with('flash-success', 'District communication plan availability added successfully');

		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		}
	}


	public function fortnightly_implementation(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'first_fortnighly_report' => 'required',
			'second_fortnighly_report'        => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator,'fortnightly_implementation')->withinput();
		}
		$fortnighly_report = new FortnightlyReport;
		$fortnighly_report->cate_name = 'Planing Platform';
		$fortnighly_report->user_id = $user_id;
		$fortnighly_report->first_fortnighly_report = $inputs['first_fortnighly_report'];  
		$fortnighly_report->second_fortnighly_report = $inputs['second_fortnighly_report'];
		if ($fortnighly_report->save()) {
			return back()->with('flash-success', 'fortnightly implementation report  added successfully');

		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		}
	}

}
