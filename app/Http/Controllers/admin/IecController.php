<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\iec\IECMaterialPrototyoe;
use App\Models\iec\LocalIEC;
use App\Models\iec\SpecialIEC;
use Auth;
use Illuminate\Support\Facades\Validator;

class IecController extends Controller
{
    
	public function index(){
		$user_id = Auth::id();
    	$today_date = date('Y-m-d');

    	$data['IecMaterialCount'] = IECMaterialPrototyoe::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['IecMaterialData'] = IECMaterialPrototyoe::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 

		$data['IecLocalCount'] = LocalIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['IecLocalData'] = LocalIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 

		$data['IecSpecialCount'] = SpecialIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
		$data['IecSpecialData'] = SpecialIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first(); 
		
		return view('admin/Iec', $data); 
	}


    public function iec_material(Request $request)
    {
    	
		$validator = Validator::make($request->all(), [
		'posters' => 'required|numeric',
		'banners' => 'required|numeric',
		'ffl' => 'required|numeric',
		'leaflet' => 'required|numeric',
		]);

		if($validator->fails()){
			return redirect()->back()->withErrors($validator)->withInput();
		}

		$user_id = Auth::id();
        $today_date = date('Y-m-d');
        $rowcount = IECMaterialPrototyoe::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        $inputs = $request->input();
        if($rowcount == 0){
          	$res = New IECMaterialPrototyoe();
        }elseif($rowcount == 1){
            $rowid = IECMaterialPrototyoe::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
           $res =  IECMaterialPrototyoe::find($rowid['id']);
        }
		$res->user_id = $user_id;
		$res->cate_name = 'IEC';
		$res->posters =	$inputs['posters'];
		$res->banners = $inputs['banners'];
		$res->ffl = $inputs['ffl'];
		$res->leaflet = $inputs['leaflet'];
		$result = $res->save();

		if($result){
	       		 if($rowcount == 0){
	                 return redirect()->back()->with('flash-success', 'IEC material/Prototyoe received from State Added Successfully');
	             }elseif($rowcount == 1){
	                 return redirect()->back()->with('flash-update', 'IEC material/Prototyoe received from State Update Successfully');
	             }
	     }else{
	            return redirect()->back()->with('flash-error', 'Error occured in adding data');
	    }
    }

    public function local_iec_material(Request $request)
    {
	
		$validator = Validator::make($request->all(), [
		'local_posters' => 'required|numeric',
		'local_banners' => 'required|numeric',
		'local_audio_clip' => 'required|numeric',
		'local_video_clip' => 'required|numeric',
		'local_jingles' => 'required|numeric',
		],[
			'local_posters.required' => 'Posters field is required',
			'local_posters.numeric' => 'Posters field must be numeric',
			'local_banners.required' => 'Banners field is required',
			'local_banners.numeric' => 'Banners field must be numeric',
			'local_audio_clip.required' => 'Audio clip field is required',
			'local_audio_clip.numeric' => 'Audio clip field must be numeric',
			'local_video_clip.required' => 'Video clip field is required',
			'local_video_clip.numeric' => 'Video clip field must be numeric',
			'local_jingles.required' => 'Jingles field is required',
			'local_jingles.numeric' => 'Jingles field must be numeric',
		]);
	
		if($validator->fails()){
			return redirect()->back()->withErrors($validator, 'Local_Iec')->withInput();
		}

		$user_id = Auth::id();
        $today_date = date('Y-m-d');
        $rowcount = LocalIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        $inputs = $request->input();
        if($rowcount == 0){
          	$res = New LocalIEC();
        }elseif($rowcount == 1){
            $rowid = LocalIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
           $res =  LocalIEC::find($rowid['id']);
        }
		$res->user_id = $user_id;
		$res->cate_name = 'IEC';
		$res->posters =	$inputs['local_posters'];
		$res->banners = $inputs['local_banners'];
		$res->audio_clip = $inputs['local_audio_clip'];
		$res->video_clip = $inputs['local_video_clip'];
		$res->jingles = $inputs['local_jingles'];
		$result = $res->save();

		if($result){
       		 if($rowcount == 0){
                 return redirect()->back()->with('flash-success', 'Local IEC material developed and disseminated Added Successfully')->with('local-iec', 'local-iec');
             }elseif($rowcount == 1){
                 return redirect()->back()->with('flash-update', 'Local IEC material developed and disseminated Update Successfully')->with('local-iec', 'local-iec');
             }
	     }else{
	            return redirect()->back()->with('flash-error', 'Error occured in adding data');
	    }
    }


    public function special_iec_material(Request $request)
    {
		$validator = Validator::make($request->all(), [
		'special_posters' => 'required|numeric',
		'special_banners' => 'required|numeric',
		'special_leaflet' => 'required|numeric',
		'special_others' => 'required|numeric',
		],[
			'special_posters.required' => 'Posters field is required',
			'special_posters.numeric' => 'Posters field must be numeric',
			'special_banners.required' => 'Banners field is required',
			'special_banners.numeric' => 'Banners field must be numeric',
			'special_leaflet.required' => 'Leaflet field is required',
			'special_leaflet.numeric' => 'Leaflet field must be numeric',
			'special_others.required' => 'Others field is required',
			'special_others.numeric' => 'Others field must be numeric',
			
		]);
	
		if($validator->fails()){
			return redirect()->back()->withErrors($validator, 'Special_Iec')->withInput();
		}

		$user_id = Auth::id();
        $today_date = date('Y-m-d');
        $rowcount = SpecialIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->count();
        $inputs = $request->input();
        if($rowcount == 0){
          	$res = New SpecialIEC();
        }elseif($rowcount == 1){
            $rowid = SpecialIEC::where('user_id', '=', $user_id)->WhereDate('created_at', $today_date)->first();
           $res =  SpecialIEC::find($rowid['id']);
        }
		$res->user_id = $user_id;
		$res->cate_name = 'IEC';
		$res->posters =	$inputs['special_posters'];
		$res->banners = $inputs['special_banners'];
		$res->leaflet = $inputs['special_leaflet'];
		$res->others = $inputs['special_others'];
		$result = $res->save();

		if($result){
       		 if($rowcount == 0){
                 return redirect()->back()->with('flash-success', 'Special IEC for Pregnant Women and Adolescent Added Successfully')->with('special-iec', 'special-iec');
             }elseif($rowcount == 1){
                 return redirect()->back()->with('flash-update', 'Special IEC for Pregnant Women and Adolescent Update Successfully')->with('special-iec', 'special-iec');
             }
	     }else{
	            return redirect()->back()->with('flash-error', 'Error occured in adding data');
	    }
    }

}
