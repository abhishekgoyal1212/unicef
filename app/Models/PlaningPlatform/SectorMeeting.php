<?php

namespace App\Models\PlaningPlatform;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;


class SectorMeeting extends Model
{
    use HasFactory;
    protected $table = SectorMeeting;

        public function all_data()
    {
    	return $this->hasOne(User::class, 'id','user_id')->select('id','districts');
    }
}
