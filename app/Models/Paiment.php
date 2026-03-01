<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Paiment extends Model
{
    /** @use HasFactory<\Database\Factories\PaimentFactory> */
    use HasFactory;

    protected $fillable = ['depense_id','from_id','to_id', 'is_payed','amount'];


    public function from() {
    return $this->belongsTo(User::class, 'from_id'); 
   }
   
   public function to() {
       return $this->belongsTo(User::class, 'to_id');  
   }
   
   public function depense() {
       return $this->belongsTo(Depense::class);
   }
}
