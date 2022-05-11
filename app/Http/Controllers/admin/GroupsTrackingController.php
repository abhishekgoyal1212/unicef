<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\GroupsTracking\GroupsTracking;
use Auth;
use Validator;

class GroupsTrackingController extends Controller
{
    public function groups_tracking(Request $request){
       $user_id = Auth::id();
        $today_date = date('Y-m-d');
        $user = GroupsTracking::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        if($user == 0){
            $validator = Validator::make($request->all(), [
                'no_nomadic_locations' => 'required|numeric',
                'no_construction_labour_sites' => 'required|numeric',
                'no_bricklin_labour_sites' => 'required|numeric',
                'no_mine_labour_sites' => 'required|numeric',
                'no_excluded_groups_sites' => 'required|numeric',
                'no_pastrol_community' => 'required|numeric',
                'no_slum_dwellers' => 'required|numeric',
                'no_sex_workers' => 'required|numeric',
            ]);
            if($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
            }

            $inputs = $request->input();
            $user_id = Auth::id();
            $res = New GroupsTracking();
            $res->user_id = $user_id;
            $res->cate_name = 'Groups Tracking';
            $res->no_nomadic_locations = $inputs['no_nomadic_locations'];
            $res->no_construction_labour_sites = $inputs['no_construction_labour_sites'];
            $res->no_bricklin_labour_sites = $inputs['no_bricklin_labour_sites'];
            $res->no_mine_labour_sites = $inputs['no_mine_labour_sites'];
            $res->no_excluded_groups_sites = $inputs['no_excluded_groups_sites'];
            $res->no_pastrol_community = $inputs['no_pastrol_community'];
            $res->no_slum_dwellers = $inputs['no_slum_dwellers'];
            $res->no_sex_workers = $inputs['no_sex_workers'];
            $result = $res->save();

            if($result){
                return back()->with('flash-success', 'Ground Level Health Functionaries Added Successfully');
            }else{
                return back()->with('flash-error', 'Error occured in adding data');
            }
        }else{
            return redirect()->back()->with('flash-error', 'Today Details Already Submitted');
        }
    }
}
