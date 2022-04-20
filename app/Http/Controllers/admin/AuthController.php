<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Session;

class AuthController extends Controller
{
    public function login()
	{
		return view('admin/login/login');
	}
	public function login_check(Request $request)
	{
		$cred = $request->validate([
			'email' => 'required|email',
			'password' => 'required',
		]);
		$inputs = $request->input();
		if(Auth::attempt($cred)){
			return redirect('admin/dashboard');
		}else{
			$request->session()->flash('flash-error', 'Username and password not found');
			return back();
		}
	}
}
