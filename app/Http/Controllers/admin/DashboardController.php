<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;
use Str;
use Validator;
use Hash;
use DB;


class DashboardController extends Controller
{
	public function index()
	{	
		$data = DB::table('meeting_institutions_religious_leaders')
		->join('users', 'users.id', '=', 'meeting_institutions_religious_leaders.user_id')
		->select('users.districts', 'meeting_institutions_religious_leaders.number_meetings', 'meeting_institutions_religious_leaders.number_participants_male', 'meeting_institutions_religious_leaders.number_participants_female')->get();

		
		
		return view('admin/dashboard/dashboard', ['data' => $data]);	
	}

	public function logout(Request $request)
	{
		Auth::logout();
		return redirect()->route('login');
	}
	public function profile(){
		return view('admin.dashboard.profile');

	}
	public function update_profile(Request $request){
		$request->validate([
			'name' => 'required',
			'districts' => 'required',
			'mobile' => 'required|numeric|min:10',
			'file' => '',
		]);
		$inputs = $request->input();
		$user_id = Auth::id();

		$res = User::find($user_id);
		$res->name = $inputs['name'];
		$res->mobile_no = $inputs['mobile'];
		$res->districts = $inputs['districts'];
		$result = $res->save();
		if($result){
			return redirect()->back()->with('flash-success', 'Profile Details Update Successfully');
		}
		else{
			return redirect()->back()->with('flash-error', 'Error occured');
		}
	}

	public function update_profile_photo(Request $request){
		
		$user_id = Auth::id();
		$res = User::find($user_id);
		$previous_image = $res->profile;
		if($_FILES['avatar']['name'] != ''){
			$img_name  = time() . '-' . Str::of(md5(time() . $request->file('avatar')->getClientOriginalName()))->substr(0, 50) . '.' . $request->file('avatar')->extension();
			$path = $request->file('avatar')->move('public\user-assets\img\users-image', $img_name);
        	$admindata['avatar'] = $img_name;
        	if($previous_image !='' && $previous_image != null){
        		$paths = public_path('user-assets\img\users-image/'.$previous_image);
        		if(!empty(file_exists($paths))){
        			unlink($paths);
        		}
        	}
        	// if (!empty($previous_image)) {
         //        Storage::delete('public\user-assets\img\users-image'. $previous_image);
         //    }
		}	

		$res->profile = $admindata['avatar'];
		$result = $res->save();

		 if ($result) {
            echo  '1' ;
        } else {
            echo  '0' ;
        }
	}

	public function update_password(Request $request){
		$inputs = $request->input();
		$validator = Validator::make($request->all(),[
			'current_password' => 'required',
			'password' => 'required',
			'confirm_password' => 'required|same:password',
		]);
		if($validator->fails()){
			return redirect('profile?type=update_password')->withErrors($validator)->withInput();
		}
		$user_id = Auth::id();

		$res = User::find($user_id);

		$hashPassword = $res->password;
		
		if(Hash::check($inputs['current_password'], $hashPassword))
		{
			$res->password = Hash::make($inputs['password']);
			$result = $res->save();
			if($result){
				return redirect()->back()->with('flash-success', 'Password Update Successfully');
			}
			else{
				return redirect()->back()->with('flash-error', 'Error occured');
			}

		}else{
			return redirect('profile?type=update_password')->with('flash-error', 'old password doesnt matched');
		}
		dd($inputs);
	}
}
