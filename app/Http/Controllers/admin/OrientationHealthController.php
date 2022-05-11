<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\OrientationHealth\OrientationHealth;
use Auth;
use Validator;

class OrientationHealthController extends Controller
{
     public function orientation_health(Request $request){
        $user_id = Auth::id();
        $today_date = date('Y-m-d');
        $user = OrientationHealth::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        if($user == 0){
            $validator = Validator::make($request->all(), [
                'number_orientation' => 'required|numeric',
                'anm' => 'required',
                'asha' => 'required',
                'anganwadi' => 'required',
                'cha' => 'required',
            ]);

            if($validator->fails()) {
             return redirect()->back()->withErrors($validator)->withInput();
            }
            $inputs = $request->input();
            $user_id = Auth::id();
            $res = New OrientationHealth();
            $res->user_id = $user_id;
            $res->cate_name = 'Orientation Health';
            $res->number_orientation = $inputs['number_orientation'];
            $res->anm = $inputs['anm'];
            $res->asha = $inputs['asha'];
            $res->anganwadi = $inputs['anganwadi'];
            $res->cha = $inputs['cha'];
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
