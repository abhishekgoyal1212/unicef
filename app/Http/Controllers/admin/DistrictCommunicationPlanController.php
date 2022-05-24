<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\DistrictCommunicationPlan\DistrictCommunicationPlan;
use Illuminate\Support\Facades\Validator;
use Auth;

class DistrictCommunicationPlanController extends Controller
{
    public function index(){

    $user_id = Auth::id();
    $today_date = date('Y-m-d');

    $data['DcpCount'] = DistrictCommunicationPlan::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
    $data['DcpData'] = DistrictCommunicationPlan::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
    return view('admin/District_Communication_Plan', $data);
    }

    public function dcp(Request $request){
        $inputs = $request->input();
        // dd($inputs);
        $validator = Validator::make($request->all(), [
            'dcp_prepared'  => 'required',
            'No_Health_Blocks_in_district' => 'required_if:dcp_prepared, 1',
            'No_Blocks_covered_in_DCP' => 'required_if:dcp_prepared, 1',
            'Whether_DCP_covered_plan_of_Urban' => 'required_if:dcp_prepared, 1',
        ],[
            'No_Health_Blocks_in_district.required_if' => 'If DCP Prepared is Yes, Field is required',
            'No_Blocks_covered_in_DCP.required_if' => 'If DCP Prepared is Yes, Field is required',
            'Whether_DCP_covered_plan_of_Urban.required_if' => 'If DCP Prepared is Yes, Field is required',

        ]);

        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user_id = Auth::id();
        $today_date = date('Y-m-d');
        $rowcount = DistrictCommunicationPlan::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        $inputs = $request->input();
        if($rowcount == 0){
            $res = New DistrictCommunicationPlan();
        }elseif($rowcount == 1){
            $rowid = DistrictCommunicationPlan::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
           $res =  DistrictCommunicationPlan::find($rowid['id']);
        }

        $res->user_id = $user_id;
        $res->cate_name = 'District Communication Plan';
        $res->dcp_prepared = $inputs['dcp_prepared'];

        if($inputs['dcp_prepared'] == 1){
            $res->No_Health_Blocks_in_district  = $inputs['No_Health_Blocks_in_district'];
            $res->No_Blocks_covered_in_DCP  = $inputs['No_Blocks_covered_in_DCP'];
            $res->Whether_DCP_covered_plan_of_Urban  = $inputs['Whether_DCP_covered_plan_of_Urban'];
        }elseif($inputs['dcp_prepared'] == 0){
            $res->No_Health_Blocks_in_district  = Null;
            $res->No_Blocks_covered_in_DCP  = Null;
            $res->Whether_DCP_covered_plan_of_Urban  = Null;
        }
        $result = $res->save();
        if($result){
                if($rowcount == 0){
                 return redirect()->back()->with('flash-success', 'District Communication Plan Added Successfully');
             }elseif($rowcount == 1){
                 return redirect()->back()->with('flash-update', 'District Communication Plan Update Successfully');
             }
        }else{
               return redirect()->back()->with('flash-error', 'Error occured in adding data');
        }
    }
}
