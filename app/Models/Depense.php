<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Depense extends Model
{
    /** @use HasFactory<\Database\Factories\DepenseFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'montant',
        'date',
        'categorie_id',
        'payer_id',
        'colocation_id',
    ];
    public function colocation():BelongsTo{
        return $this->belongsTo(Colocation::class);
    }
}
