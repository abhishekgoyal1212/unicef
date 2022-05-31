<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ChartsController extends Controller
{
    public function sm_chart(){
        $data['districts'] = User::orderBy('districts', 'Asc')->get();
        return view('admin/charts/Sm_Chart', $data);
    }

    public function pvt_chart(){
        $data['districts'] = User::orderBy('districts', 'Asc')->get();
        return view('admin/charts/Pvt_Chart', $data);
    }

    public function mass_chart(){
        $data['districts'] = User::orderBy('districts', 'Asc')->get();
        return view('admin/charts/Mass_Chart', $data);
    }
}
