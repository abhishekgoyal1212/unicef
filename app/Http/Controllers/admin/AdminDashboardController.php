<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class AdminDashboardController extends Controller
{
    
    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
