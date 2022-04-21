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
		Auth::logout();
		return redirect()->route('login');

	}
	
}
