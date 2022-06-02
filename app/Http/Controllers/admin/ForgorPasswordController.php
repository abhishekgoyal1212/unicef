<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Models\User;
use Hash;
use Carbon\Carbon;

class ForgorPasswordController extends Controller
{
	public function forgot_password_save(Request $req)
	{
		$req->validate([
        'email' => 'required|email|exists:users',
    ]);
		 $token = str::random(64);
	  $save_data =	DB::table('password_resets')->insert(['email'=> $req->email , 'token'=>$token , 
			'created_at'=>Carbon::now()]);
		Mail::send('admin.login.email_verify',['token'=>$token],function($message)use($req){
			$message->to($req->email);
			$message->subject('Reset Password Notification');
		});
		return back()->with('flash-success','We have e-mailed your password reset link!');
	}
	public function get_password($token)
	{
		return view('admin.login.reset',['token'=>$token]);
	}

	public function update_password(Request $request)
	{
		  $request->validate([
      		'email' => 'required|email|exists:users',
      		'password' => 'required|string|min:6|confirmed',
      		'password_confirmation' => 'required',
  		]);
		  $updatepassword = DB::table('password_resets')->where(['email'=>$request->email,'token'=>$request->token])->first();
		  // dd($updatepassword);
		  if ($updatepassword) {
		  	$user = User::where('email', $request->email)->update(['password' => Hash::make($request->password)]);
		  	  DB::table('password_resets')->where(['email'=> $request->email])->delete();
		  	  return redirect('/login')->with('flash-success', 'Your password has been changed!');
		  }else{
		  	return back()->withInput()->with('flash-error', 'Invalid token!');
		  }
	}
}
