<?php

namespace App\Http\Controllers;

use App\Models\Paiment;
use Illuminate\Http\Request;

class PaimentController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function markAsPaid(Paiment $paiment)
{
    // dd($paiment);
    $paiment->update(['is_payed' => 'payed']);
    return back()->with('succes', 'Paiement marque is paye ');
}
    

}
