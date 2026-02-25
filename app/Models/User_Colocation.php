<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User_Colocation extends Model
{
    //
    protected $table='user_colocation';
    protected $fillable = [
        'joined_at',
        'user_id',
        'colocation_id',
    ];
}
