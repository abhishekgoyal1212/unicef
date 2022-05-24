<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\MassMedia\MassMedia;
use Auth;
use Validator;

class MassMediaController extends Controller
{
    public function mass(){
        $user_id = Auth::id();
        $today_date = date('Y-m-d');
        $data['MassCount'] = MassMedia::where('user_id', $user_id)->whereDate('created_at', $today_date)->count();
        $data['MassData'] = MassMedia::where('user_id', $user_id)->whereDate('created_at', $today_date)->first();
        return view('admin/Mass Media Mid Media', $data);
    }
    public function insert_mass_media(Request $request){       
            $validator = Validator::make($request->all(), [
                'rally_covid_vaccination' => 'required',
                'rally_covid_reach_male' => 'required|numeric',
                'rally_covid_reach_female' => 'required|numeric',
                'nukad_natak' => 'required',
                'nukad_natak_reach_male' => 'required|numeric',
                'nukad_natak_reach_female' => 'required|numeric',
                'flok_program' => 'required',
                'flok_program_reach_male' => 'required|numeric',
                'flok_program_reach_female' => 'required|numeric',
                'local_community' => 'required',
                'local_community_reach_male' => 'required|numeric',
                'local_community_reach_female' => 'required|numeric',
                'cable_tv' => 'required',
                'cable_tv_reach_male' => 'required|numeric',
                'cable_tv_reach_female' => 'required|numeric',
                'flash_mob' => 'required',
                'flash_mob_reach_male' => 'required|numeric',
                'flash_mob_reach_female' => 'required|numeric',
                'others' => 'required',
                'others_reach_male' => 'required|numeric',
                'others_reach_female' => 'required|numeric',
            ]);

             if ($validator->fails()) {
             return redirect()->back()->withErrors($validator)
                            ->withInput();
            }
            $user_id = Auth::id();
            $today_date = date('Y-m-d');
            $rowcount = MassMedia::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count(); 

            $inputs = $request->input(); 
            if($rowcount == 0){
                $res = New MassMedia();
            }elseif($rowcount == 1){
                $rowid = MassMedia::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 
                $res = MassMedia::find($rowid['id']);
            }
            $res->user_id = $user_id;
            $res->cate_name = 'Mass Media Mid Media';
            $res->rally_covid_vaccination = $inputs['rally_covid_vaccination'];
            $res->rally_covid_reach_male = $inputs['rally_covid_reach_male'];
            $res->rally_covid_reach_female = $inputs['rally_covid_reach_female'];
            $res->nukad_natak = $inputs['nukad_natak'];
            $res->nukad_natak_reach_male = $inputs['nukad_natak_reach_male'];
            $res->nukad_natak_reach_female = $inputs['nukad_natak_reach_female'];
            $res->flok_program = $inputs['flok_program'];
            $res->flok_program_reach_male = $inputs['flok_program_reach_male'];
            $res->flok_program_reach_female = $inputs['flok_program_reach_female'];
            $res->local_community = $inputs['local_community'];
            $res->local_community_reach_male = $inputs['local_community_reach_male'];
            $res->local_community_reach_female = $inputs['local_community_reach_female'];
            $res->cable_tv = $inputs['cable_tv'];
            $res->cable_tv_reach_male = $inputs['cable_tv_reach_male'];
            $res->cable_tv_reach_female = $inputs['cable_tv_reach_female'];
            $res->flash_mob = $inputs['flash_mob'];
            $res->flash_mob_reach_male = $inputs['flash_mob_reach_male'];
            $res->flash_mob_reach_female = $inputs['flash_mob_reach_female'];
            $res->others = $inputs['others'];
            $res->others_reach_male = $inputs['others_reach_male'];
            $res->others_reach_female = $inputs['others_reach_female'];
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
