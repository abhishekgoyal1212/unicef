<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class DashboardController extends Controller
{
	public function index()
	{
		return view('admin/dashboard/dashboard');
	}

	public function logout(Request $request)
	{
		if(Auth()->user()->role == 1){
		Auth::logout();
		return redirect()->route('admin_login');
		}elseif(Auth()->user()->role == 2){
		Auth::logout();
		return redirect()->route('login');
		}
	
	}
	
}
