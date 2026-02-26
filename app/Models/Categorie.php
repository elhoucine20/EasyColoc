<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Categorie extends Model
{
    //
    protected $fillable = ['name','colocation_id'];


    public function colocation():BelongsTo{
        return $this->belongsTo(colocation::class);
    }

    public function depense():HasMany{
        return $this->hasMany(Depense::class);
    }
}
