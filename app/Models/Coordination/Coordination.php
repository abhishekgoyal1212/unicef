<?php

namespace App\Models\Coordination;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Coordination extends Model
{
    use HasFactory;
    protected $table = 'coordination_line_dept_meeting';

    public function all_data(){
        return $this->hasOne(User::class, 'id','user_id')->select('id','districts');
    }
}
