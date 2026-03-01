<?php

namespace App\Http\Controllers;

use App\Models\Colocation;
use App\Models\Depense;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    //
    
    


    public function index()
{
    return view('Admin/dashbord-admin', [
        'totalUsers'      => User::count(),
        'totalColocations'=> Colocation::count(),
        'totalDepenses'   => Depense::sum('montant'),
        'totalBanned'     => User::where('statu', 'banned')->count(),
        'users'           => User::all(),
    ]);
}

public function ban(User $user) {
    // dd($user);
    $user->update(['statu' => 'banned']);
    return back()->with('success', 'Utilisateur banni ✅');
}

public function unban(User $user) {
    $user->update(['statu' => 'active']);
    return back()->with('success', 'Utilisateur débanni ✅');
}

}
