<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IecController extends Controller
{
    public function iec_material()
    {
    	$user_id = Auth::id();
		$inputs = $request->all();
		$validator = Validator::make($request->all(), [
			'number_orientation'        => 'required',
			'number_participants' => 'required',
		]);
		if ($validator->fails()) {
			return redirect()->back()->withErrors($validator)->withinput();
		}
    }
}
