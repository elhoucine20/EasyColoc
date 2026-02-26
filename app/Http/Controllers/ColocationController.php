<?php

namespace App\Http\Controllers;

use App\Http\Services\Validate;
use App\Models\Categorie;
use App\Models\Colocation;
use App\Models\User;
use App\Models\User_Colocation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;

use function Symfony\Component\Clock\now;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // $colocations = Colocation::all();
        $colocations = Auth::user()->colocation;
        return view('User/colocations',compact('colocations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('User/create-colocation');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        // dd(Auth::user()->id);
        
        if (Validate::ValidateColocationName($request)) {
            # code...
            if (Validate::ColocationsStatuIsActive(Auth::user())) 
                return back()->with('error','impossible creation nouveaux colocation ! déja un colocation active');
            //    dd('tout les colocation is inactive');

            
            try {
                DB::beginTransaction();

              $Colocation = Colocation::create([
                    'name'=>$request->colocationName,
                    // 'statu'=>'active',
                    'owner_id'=>Auth::user()->id,
                ]);

                User_Colocation::create([
                    'joined_at'=>now(),
                    'colocation_id'=>$Colocation->id,
                    'user_id'=>Auth::user()->id,
                    
                ]);

                DB::commit();

                return redirect()->route('colocation.index');
            } catch (\Exception $e) {
                DB::rollBack();
                return $e->getMessage();
            }
        }else{
            return back();
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Colocation $Colocation)
    {
        //
        // dd($Colocation);
        $categories = Categorie::where('colocation_id','=',$Colocation->id)->get();

        $users = User_Colocation::with('user')->where('colocation_id','=',$Colocation->id)->get();
        // dd($users);
        return view('User/colocation-entree',compact('Colocation','categories','users'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Colocation $Colocation)
    {
        //
        // dd($Colocation);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Colocation $Colocation)
    {
        // dd($colocation);
        $Colocation->update([
            'statu'=>"Inactive",
        ]);
        
        return $this->index();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colocation $Colocation)
    {
        //
    }
}
