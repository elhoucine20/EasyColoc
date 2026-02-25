<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Colocation extends Model
{
    //
    protected $fillable = [
      'statu',
      'name',
      'owner_id'
      ];
    
    public function user():BelongsToMany{
      return $this->belongsToMany(User::class,'user_colocation');
    }

    public function categorie():HasMany{
      return $this->hasMany(Categorie::class);
    }
}
