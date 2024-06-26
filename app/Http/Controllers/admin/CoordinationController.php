<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Coordination\Coordination;
use Auth;
use Validator;

class CoordinationController extends Controller
{
    
    public function coordination(){
        $user_id = Auth::id();
        $today_date = date('Y-m-d');

        $data['CoordinationCount'] = Coordination::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        $data['CoordinationData'] = Coordination::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
        return view('admin/Coordination Meeting Line', $data);
    }

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
            $user_id = Auth::id();
            $today_date = date('Y-m-d');
            $rowcount = Coordination::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();

            $inputs = $request->input();
            if($rowcount == 0){
                $res = New Coordination();
            }elseif($rowcount == 1){
                $rowid = Coordination::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
                $res = Coordination::find($rowid['id']);
            }

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
                if($rowcount == 0){
                    return back()->with('flash-success', 'Coordination meeting with line dept Added Successfully');
                }elseif($rowcount == 1){
                     return back()->with('flash-update', 'Coordination meeting with line dept Update Successfully');
                }
            }else{
                return back()->with('flash-error', 'Error occured in adding data');
            }
    }
}
