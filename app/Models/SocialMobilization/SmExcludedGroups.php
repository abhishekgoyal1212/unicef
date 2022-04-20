<?php

namespace App\Models\SocialMobilization;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SmExcludedGroups extends Model
{
    use HasFactory;
    protected $table = 'sm_excluded_groups_meeting';
}