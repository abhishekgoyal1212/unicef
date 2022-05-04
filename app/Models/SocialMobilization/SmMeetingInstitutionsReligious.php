<?php

namespace App\Models\SocialMobilization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class SmMeetingInstitutionsReligious extends Model
{
    use HasFactory;
    protected $table = 'meeting_institutions_religious_leaders';

    public function Alldeta()
    {
        return $this->hasOne(User::class,'id','user_id')->select('id','districts');
    }
}
