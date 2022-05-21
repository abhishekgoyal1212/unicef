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
	
	public function pvt_bodies(){
		$user_id = Auth::id();
	    $today_date = date('Y-m-d');
	    $data['ImaCount'] = MeetingIMA::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['ImaData'] = MeetingIMA::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

	    $data['PractitionersCount'] = MeetingPractitioners::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['PractitionersData'] = MeetingPractitioners::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

	    $data['PharmacistsCount'] = PharmacistsAssociations::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['PharmacistsData'] = PharmacistsAssociations::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

	    $data['MerchantCount'] = MerchantAssociation::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['MerchantData'] = MerchantAssociation::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

	    $data['OtherCount'] = Others::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    $data['OtherData'] = Others::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();

		return view('admin/Pvt Bodies', $data);
	}
	public function meeting_ima(Request $request)
	{   
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_meeting'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withinput();
			}
			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	    	$rowcount = MeetingIMA::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    	if($rowcount == 0){
	    		$dhs_meeting = new MeetingIMA;
	    	}elseif($rowcount == 1){
	    		$rowid = MeetingIMA::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	    		$dhs_meeting = MeetingIMA::find($rowid['id']);
	    	}
			$dhs_meeting->cate_name = 'Pvt Bodies';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_meeting = $inputs['number_meeting']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($rowcount == 0){
	    			return back()->with('flash-success', 'Meeting with IMA/IAP added successfully');
		    	}elseif($rowcount == 1){
					return back()->with('flash-update', 'Meeting with IMA/IAP update successfully');
		    	}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			}
	}

	public function meeting_private(Request $request){
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'number_meeting'        => 'required',
			'number_participants' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator,'Private_Meeting')->withinput();
		}
		$user_id = Auth::id();
    	$today_date = date('Y-m-d');
    	$rowcount = MeetingPractitioners::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		if($rowcount == 0){
			$dhs_meeting = new MeetingPractitioners;
		}elseif($rowcount == 1){
    		$rowid = MeetingPractitioners::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
			$dhs_meeting = MeetingPractitioners::find($rowid['id']);
		}
		$dhs_meeting->cate_name = 'Pvt Bodies';
		$dhs_meeting->user_id = $user_id;
		$dhs_meeting->number_meeting = $inputs['number_meeting']; 
		$dhs_meeting->number_participants = $inputs['number_participants'];
		if($dhs_meeting->save()){
			if($rowcount == 0){
				return back()->with('flash-success', 'Meeting with private practitioners added successfully')->with('meeting-practitioners', 'meeting-practitioners');
    		}elseif($rowcount == 1){
				return back()->with('flash-update', 'Meeting with private practitioners update successfully')->with('meeting-practitioners', 'meeting-practitioners');
    		}
		}else{
			return back()->with('flash-error', 'Error occured in adding data');
		} 
	}


	public function pharmacists_associations(Request $request){
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_meeting'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator, 'Pharmacists_Associations')->withinput();
			}
			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	    	$rowcount = PharmacistsAssociations::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    	if($rowcount == 0){
				$dhs_meeting = new PharmacistsAssociations;
	    	}elseif($rowcount == 1){
	    		$rowid = PharmacistsAssociations::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	    		$dhs_meeting = PharmacistsAssociations::find($rowid['id']);
	    	}
			$dhs_meeting->cate_name = 'Pvt Bodies';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_meeting = $inputs['number_meeting']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($rowcount == 0){
					return back()->with('flash-success', 'Pharmacists associations added successfully')->with('pharmacists-associations', 'pharmacists-associations');
		    	}elseif($rowcount == 1){
					return back()->with('flash-update', 'Pharmacists associations update successfully')->with('pharmacists-associations', 'pharmacists-associations');
		    	}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			} 
	}


	public function merchant_association(Request $request){   	
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_meeting'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator, 'Merchant_Association')->withinput();
			}
			$user_id = Auth::id();
		    $today_date = date('Y-m-d');
		    $countrow = MerchantAssociation::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		    if($countrow == 0){
				$dhs_meeting = new MerchantAssociation;
		    }elseif($countrow == 1){
		    	$rowid = MerchantAssociation::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
				$dhs_meeting = MerchantAssociation::find($rowid['id']);
		    }

			$dhs_meeting->cate_name = 'Pvt Bodies';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_meeting = $inputs['number_meeting']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($countrow == 0){
					return back()->with('flash-success', 'Merchant association added successfully')->with('merchant-association', 'merchant-association');
			    }elseif($countrow == 1){
			    	return back()->with('flash-update', 'Merchant association update successfully')->with('merchant-association', 'merchant-association');
			    }
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			} 
	}


	public function Others(Request $request){
			$inputs = $request->all();
			$validator = Validator::make($request->all(), [
				'number_meeting'        => 'required',
				'number_participants' => 'required',
			]);
			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator, 'Others_Pvt')->withinput();
			}
			$user_id = Auth::id();
	    	$today_date = date('Y-m-d');
	    	$rowcount = Others::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
	    	if($rowcount == 0){
				$dhs_meeting = new Others;
	    	}elseif($rowcount == 1){
	    		$rowid = Others::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
	    		$dhs_meeting = Others::find($rowid['id']);
	    	}
			$dhs_meeting->cate_name = 'Pvt Bodies';
			$dhs_meeting->user_id = $user_id;
			$dhs_meeting->number_meeting = $inputs['number_meeting']; 
			$dhs_meeting->number_participants = $inputs['number_participants'];

			if($dhs_meeting->save()){
				if($rowcount == 0){
					return back()->with('flash-success', 'Others added successfully')->with('others', 'others');
		    	}elseif($rowcount == 1){
		    		return back()->with('flash-update', 'Others update successfully')->with('others', 'others');
		    	}
			}else{
				return back()->with('flash-error', 'Error occured in adding data');
			} 
	}
}
