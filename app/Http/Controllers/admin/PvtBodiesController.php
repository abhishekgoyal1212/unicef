<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PvtBodies\MeetingIMA;
use App\Models\PvtBodies\MeetingPractitioners;
use App\Models\PvtBodies\PharmacistsAssociations;
use App\Models\PvtBodies\MerchantAssociation;
use App\Models\PvtBodies\Others;
use Auth;
use Validator;

class PvtBodiesController extends Controller
{
	public function meeting_ima(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'number_meeting'        => 'required',
			'number_participants' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withinput();
		}
		$dhs_meeting = new MeetingIMA;
		$dhs_meeting->cate_name = 'Pvt Bodies';
		$dhs_meeting->user_id = $user_id;
		$dhs_meeting->number_meeting = $inputs['number_meeting']; 
		$dhs_meeting->number_participants = $inputs['number_participants'];

		if($dhs_meeting->save()){
			return back()->with('flash-success', 'Education department added successfully');
		}else{
			return back()->with('flash-error', 'Error occured in adding data');

	}
}

		public function meeting_private(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'number_meeting'        => 'required',
			'number_participants' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator,'Private_Meeting')->withinput();
		}
		$dhs_meeting = new MeetingPractitioners;
		$dhs_meeting->cate_name = 'Pvt Bodies';
		$dhs_meeting->user_id = $user_id;
		$dhs_meeting->number_meeting = $inputs['number_meeting']; 
		$dhs_meeting->number_participants = $inputs['number_participants'];

		if($dhs_meeting->save()){
			return back()->with('flash-success', 'Panchayati raj rural development added successfully');
		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		} 

	}


		public function pharmacists_associations(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'number_meeting'        => 'required',
			'number_participants' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator, 'Pharmacists_Associations')->withinput();
		}
		$dhs_meeting = new PharmacistsAssociations;
		$dhs_meeting->cate_name = 'Pvt Bodies';
		$dhs_meeting->user_id = $user_id;
		$dhs_meeting->number_meeting = $inputs['number_meeting']; 
		$dhs_meeting->number_participants = $inputs['number_participants'];

		if($dhs_meeting->save()){
			return back()->with('flash-success', 'Minority deparment added successfully');
		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		} 

	}


		public function merchant_association(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'number_meeting'        => 'required',
			'number_participants' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator, 'Merchant_Association')->withinput();
		}
		$dhs_meeting = new MerchantAssociation;
		$dhs_meeting->cate_name = 'Pvt Bodies';
		$dhs_meeting->user_id = $user_id;
		$dhs_meeting->number_meeting = $inputs['number_meeting']; 
		$dhs_meeting->number_participants = $inputs['number_participants'];

		if($dhs_meeting->save()){
			return back()->with('flash-success', 'ULB deparment added successfully');
		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		} 

	}


		public function Others(Request $request)
	{
		$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'number_meeting'        => 'required',
			'number_participants' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator, 'Others_Pvt')->withinput();
		}
		$dhs_meeting = new Others;
		$dhs_meeting->cate_name = 'Pvt Bodies';
		$dhs_meeting->user_id = $user_id;
		$dhs_meeting->number_meeting = $inputs['number_meeting']; 
		$dhs_meeting->number_participants = $inputs['number_participants'];

		if($dhs_meeting->save()){
			return back()->with('flash-success', 'CSR deparment added successfully');
		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		} 

	}


}
