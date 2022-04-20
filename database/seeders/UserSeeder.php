<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$inputs =[
            
    			'name'     => 'Neeraj Mishra',
    			'mobile_no'=>  9557779947,
    			'districts'=> 'Churu',
    			'email'    => 'neeraj.j18@iihmr.in',
    			'password' => Hash::make('admin1234'),

    	];
        User::create($inputs);
    }
}
