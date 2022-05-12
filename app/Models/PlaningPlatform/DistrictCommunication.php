<?php

namespace App\Models\PlaningPlatform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class DistrictCommunication extends Model
{
    use HasFactory;
    protected $table = 'district_communication_plan';

    public function all_data()
    {
    	return $this->hasOne(User::class, 'id','user_id')->select('id','districts');
    }
}
