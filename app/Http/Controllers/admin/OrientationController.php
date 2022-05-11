<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Orientation\EducationDepartment;
use App\Models\Orientation\PanchayatiRaj;
use App\Models\Orientation\MinorityDeparment;
use App\Models\Orientation\UlbDeparment;
use App\Models\Orientation\CsrDeparment;
use Auth;
use Validator;

class OrientationController extends Controller
{
	public function education_department(Request $request)
	{
		$user_id = Auth::id();
	    $today_date = date('Y-m-d');
	    $user = EducationDepartment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    	if($user == 0){	
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withinput();
			}
			$dhs_meeting = new EducationDepartment;
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				return back()->with('flash-success', 'Education department added successfully');
			}else{
				return back()->with('flash-error', 'Error occured in adding data');

			}
		}else{
				return redirect()->back()->with('flash-error', 'Today Details Already Submitted');
		}

	}

	public function panchayati_raj(Request $request){
		$user_id = Auth::id();
	    $today_date = date('Y-m-d');
	    $user = PanchayatiRaj::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    	if($user == 0){	
			$user_id = Auth::id();
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'panchayati_raj')->withinput();
			}
			$dhs_meeting = new PanchayatiRaj;
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				return back()->with('flash-success', 'Panchayati raj rural development added successfully')->with('panchayati-raj', 'panchayati-raj');
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			} 
		}else{
				return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('panchayati-raj', 'panchayati-raj');
		}
	}


	public function minority_deparment(Request $request){
		$user_id = Auth::id();
	    $today_date = date('Y-m-d');
	    $user = MinorityDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    	if($user == 0){	
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'minority_deparment')->withinput();
			}
			$dhs_meeting = new MinorityDeparment;
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				return back()->with('flash-success', 'Minority deparment added successfully')->with('mnority-deparment', 'mnority-deparment');
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
		}else{
				return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('mnority-deparment', 'mnority-deparment');
		} 

	}


	public function ulb_deparment(Request $request){
		$user_id = Auth::id();
	    $today_date = date('Y-m-d');
	    $user = UlbDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    	if($user == 0){	
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'ulb_deparment')->withinput();
			}
			$dhs_meeting = new UlbDeparment;
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				return back()->with('flash-success', 'ULB deparment added successfully')->with('ulb-deparment', 'ulb-deparment');
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
		}else{
				return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('ulb-deparment', 'ulb-deparment');
		}
	}


	public function csr_deparment(Request $request){
		$user_id = Auth::id();
	    $today_date = date('Y-m-d');
	    $user = CsrDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    	if($user == 0){	
			$user_id = Auth::id();
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'csr_deparment')->withinput();
			}
			$dhs_meeting = new CsrDeparment;
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				return back()->with('flash-success', 'CSR deparment added successfully')->with('csr-deparment', 'csr-deparment');
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			} 
		}else{
				return redirect()->back()->with('flash-error', 'Today Details Already Submitted')->with('csr-deparment', 'csr-deparment');
		}

	}


}
