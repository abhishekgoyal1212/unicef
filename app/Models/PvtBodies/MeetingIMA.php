<?php

namespace App\Models\PvtBodies;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class MeetingIMA extends Model
{
    use HasFactory;
    protected $table = 'pvt_ima_iap_meeting';
    public function all_data(){
        return $this->hasOne(User::class, 'id','user_id')->select('districts')->groupBy('districts');
    }
}