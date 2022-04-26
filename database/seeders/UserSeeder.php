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
            [
                'name'     => 'Admin',
                'mobile_no'=>  6565654646,
                'districts'=> 'Churu',
                'email'    => 'admin@gmail.com',
                'role'     =>  1,
                'password' => Hash::make('admin1234'),
            ],
            [
                'name'     => 'Neeraj Mishra',
                'mobile_no'=>  9557779947,
                'districts'=> 'Churu',
                'email'    => 'neeraj.j18@iihmr.in',
                'role'     =>  2,
                'password' => Hash::make('admin1234'),
            ],
            [
                'name'     => 'Gaurav Kumar Gupta',
                'mobile_no'=>  9568574380,
                'districts'=> 'karauli',
                'email'    => 'gauravguptaunicef@gmail.com',
                'role'     =>  2,
                'password' => Hash::make('admin1234'),
            ],            [
                'name'     => 'Parvez Akhtar',
                'mobile_no'=>  8595119797,
                'districts'=> 'Tonk',
                'email'    => 'ayadparvez2021@gmail.com',
                'role'     =>  2,
                'password' => Hash::make('admin1234'),
            ],            [
                'name'     => 'Vishal Babu',
                'mobile_no'=>  8868991104,
                'districts'=> 'Jalor',
                'email'    => 'vishuskb@gmail.com',
                'role'     =>  2,
                'password' => Hash::make('admin1234'),
            ]
        ];
         foreach ($inputs as $key => $value) {
             User::create($value);
         }
    }
}
