<?php

namespace App\Http\Controllers;

use App\Http\Services\Validate;
use App\Models\Categorie;
use App\Models\Colocation;
use App\Models\Paiment;
use App\Models\User;
use App\Models\User_Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class ColocationController extends Controller
{

    public function index()
    {
        $userId = Auth::id();

        $colocationIds = User_Colocation::where('user_id', $userId)->whereNull('left_at')->pluck('colocation_id');
        // dd($colocationIds);
        $colocations = Colocation::whereIn('id', $colocationIds)->get();

        return view('User/colocations', compact('colocations'));
    }

    public function create()
    {
        //
        return view('User/create-colocation');
    }

    public function store(Request $request)
    {
        //
        // dd(Auth::user()->id);

        if (Validate::ValidateColocationName($request)) {
            # code...
            if (Validate::ColocationsStatuIsActive(Auth::user()))
                return back()->with('error', 'impossible creation nouveaux colocation ! déja un colocation active');
            //    dd('tout les colocation is inactive');


            try {
                DB::beginTransaction();

                $Colocation = Colocation::create([
                    'name' => $request->colocationName,
                    // 'statu'=>'active',
                    'owner_id' => Auth::user()->id,
                ]);

                User_Colocation::create([
                    'joined_at' => now(),
                    'colocation_id' => $Colocation->id,
                    'user_id' => Auth::user()->id,

                ]);

                DB::commit();

                return redirect()->route('colocation.index');
            } catch (\Exception $e) {
                DB::rollBack();
                return $e->getMessage();
            }
        } else {
            return back();
        }
    }

    public function show(Colocation $Colocation)
    {
        //
        // dd($Colocation);
        $categories = Categorie::where('colocation_id', '=', $Colocation->id)->get();

        $users = User_Colocation::with('user')->where('colocation_id', '=', $Colocation->id)->get();
        // dd($users);

        $paiments = Paiment::with(['from', 'to', 'depense'])->join('depenses', 'depenses.id', '=', 'paiments.depense_id')->where('depenses.colocation_id', $Colocation->id)->select('paiments.*')->get();

        return view('User/colocation-entree', compact('Colocation', 'categories', 'users', 'paiments'));
    }


    public function update(Request $request, Colocation $Colocation)
    {
        // dd($colocation);
        $Colocation->update([
            'statu' => "Inactive",
        ]);

        return to_route('colocation.index');
    }

    public function leave(Colocation $Colocation)
    {
        if ($Colocation->owner_id == Auth::id()) {
            return back()->with('error', 'Owner ne peut pas quitter sa colocation');
        }

        $member = User_Colocation::where('colocation_id', $Colocation->id)
            ->where('user_id', Auth::id())
            ->whereNull('left_at')
            ->firstOrFail();

        $member->update(['left_at' => now()]);
        // dd($member->left_at);
        $hasDette = Paiment::where('from_id', Auth::id())
            ->where('is_payed', 'inpayed')
            ->join('depenses', 'depenses.id', '=', 'paiments.depense_id')
            ->where('depenses.colocation_id', $Colocation->id)
            ->exists();

        // dd($hasDette, Auth::user()->evaluation);
        $user = User::find(Auth::id());
        $user->evaluation = $hasDette ? $user->evaluation - 1 : $user->evaluation + 1;
        $user->save();


        return redirect()->route('colocation.index');
    }
}
