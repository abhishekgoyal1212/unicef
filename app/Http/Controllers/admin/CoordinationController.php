<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordination\Coordination;
use Auth;
use Validator;

class CoordinationController extends Controller
{
    public function insert_coordination(Request $request){
        $validator = Validator::make($request->all(), [
            'panchayti_rural_development' => 'required',
            'icds' => 'required',
            'education' => 'required',
            'srlm' => 'required',
            'tribal_area' => 'required',
            'dmwo' => 'required',
        ]);

         if ($validator->fails()) {
         return redirect()->back()->withErrors($validator)
                        ->withInput();
        }

        $inputs = $request->input();
        $user_id = Auth::id();
        $res = New Coordination();
        $res->user_id = $user_id;
        $res->cate_name = 'Coordination Meeting Line';
        $res->panchayti_rural_development = $inputs['panchayti_rural_development'];
        $res->icds = $inputs['icds'];
        $res->education = $inputs['education'];
        $res->srlm = $inputs['srlm'];
        $res->tribal_area = $inputs['tribal_area'];
        $res->dmwo = $inputs['dmwo'];
        $result = $res->save();

        if($result){
            return back()->with('flash-success', 'Coordination meeting with line dept Added Successfully');
        }else{
            return back()->with('flash-error', 'Error occured in adding data');
        }
    }
}
