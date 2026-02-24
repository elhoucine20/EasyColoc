<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Colocation extends Model
{
    //
    protected $fillable = [
        'type',
        'joined_at',
        'left_at',
        'user_id',
        'colocation_id',
    ];
}
