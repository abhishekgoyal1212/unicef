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
	
	public function orientation(){
		$user_id = Auth::id();
    	$today_date = date('Y-m-d');
		$data['EducationCount'] = EducationDepartment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['EducationData'] = EducationDepartment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

		$data['PanchayatiRajCount'] = PanchayatiRaj::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['PanchayatiRajData'] = PanchayatiRaj::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

		$data['MinorityCount'] = MinorityDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['MinorityData'] = MinorityDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

		$data['UlbCount'] = UlbDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['UlbData'] = UlbDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

		$data['CsrCount'] = CsrDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['CsrData'] = CsrDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

		return view('admin/Orientation', $data);
	}

	

	public function education_department(Request $request)
	{ 	
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withinput();
			}
			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	   		$rowcount = EducationDepartment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	   		if($rowcount == 0){
				$dhs_meeting = new EducationDepartment;
	   		}elseif($rowcount == 1){
	   			$rowid = EducationDepartment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	   			$dhs_meeting = EducationDepartment::find($rowid['id']);
	   		}
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($rowcount == 0){
					return back()->with('flash-success', 'Education department added successfully');
		   		}elseif($rowcount == 1){
		   			return back()->with('flash-update', 'Education department update successfully');
		   		}

			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}

	public function panchayati_raj(Request $request){
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'panchayati_raj')->withinput();
			}
			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	   		$rowcount = PanchayatiRaj::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	   		if($rowcount == 0){
	   			$dhs_meeting = new PanchayatiRaj;
	   		}elseif($rowcount == 1){
	   			$rowid = PanchayatiRaj::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	   			$dhs_meeting = PanchayatiRaj::find($rowid['id']);
	   		}
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($rowcount == 0){
					return back()->with('flash-success', 'Panchayati raj rural development added successfully')->with('panchayati-raj', 'panchayati-raj');
		   		}elseif($rowcount == 1){
		   			return back()->with('flash-update', 'Panchayati raj rural development update successfully')->with('panchayati-raj', 'panchayati-raj');
		   		}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			} 
	}


	public function minority_deparment(Request $request){
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'minority_deparment')->withinput();
			}
			$user_id = Auth::id();
	   		$today_date = date('Y-m-d');
	    	$rowcount = MinorityDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    	if($rowcount == 0 ){
				$dhs_meeting = new MinorityDeparment;
	    	}elseif($rowcount == 1){
	    		$rowid = MinorityDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	    		$dhs_meeting = MinorityDeparment::find($rowid['id']);
	    	}
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($rowcount == 0 ){
					return back()->with('flash-success', 'Minority deparment added successfully')->with('mnority-deparment', 'mnority-deparment');
		    	}elseif($rowcount == 1){
					return back()->with('flash-update', 'Minority deparment update successfully')->with('mnority-deparment', 'mnority-deparment');
		    	}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}


	public function ulb_deparment(Request $request){
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'ulb_deparment')->withinput();
			}

			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	   		$rowcount = UlbDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	   		if($rowcount == 0){
				$dhs_meeting = new UlbDeparment;
	   		}elseif($rowcount == 1){
	   			$rowid = UlbDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	   			$dhs_meeting = UlbDeparment::find($rowid['id']);
	   		}
			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
			if($rowcount == 0){
				return back()->with('flash-success', 'ULB deparment added successfully')->with('ulb-deparment', 'ulb-deparment');
	   		}elseif($rowcount == 1){
	   			return back()->with('flash-update', 'ULB deparment update successfully')->with('ulb-deparment', 'ulb-deparment');
	   		}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}


	public function csr_deparment(Request $request){	
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_orientation'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator,'csr_deparment')->withinput();
			}
			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	    	$rowcount = CsrDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    	if($rowcount == 0){
				$dhs_meeting = new CsrDeparment;
	    	}elseif($rowcount == 1){
	    		$rowid = CsrDeparment::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
				$dhs_meeting = CsrDeparment::find($rowid['id']);
	    	}

			$dhs_meeting->cate_name = 'Orientation';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_orientation = $inputs['number_orientation']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($rowcount == 0){
					return back()->with('flash-success', 'CSR deparment added successfully')->with('csr-deparment', 'csr-deparment');
		    	}elseif($rowcount == 1){
		    		return back()->with('flash-update', 'CSR deparment update successfully')->with('csr-deparment', 'csr-deparment');
		    	}

			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			} 
	}


}
