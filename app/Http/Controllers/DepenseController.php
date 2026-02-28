<?php

namespace App\Http\Controllers;

use App\Http\Requests\FormPostRequest;
use App\Http\Services\Validate;
use App\Models\Categorie;
use App\Models\Colocation;
use App\Models\Depense;
use App\Models\Paiment;
use App\Models\User_Colocation;
use Illuminate\Http\Request;

class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        // return view('User/create-depense');
        return to_route('colocation.index');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(FormPostRequest $request,Colocation $colocation)
    {
        //
        // $requestValidated = Validate::validateDepense($request);
        // dd($request->post());
            // Depense::create($requestValidated);
            $depense = Depense::create([
                'title'=>$request->title,
                'montant'=>$request->montant,
                'date'=>$request->date,
                'colocation_id'=>$request->colocation_id,
                'categorie_id'=>$request->categorie_id,
                'payer_id'=>$request->payer_id,
            ]);

            $members = User_Colocation::where('colocation_id',$request->colocation_id)->get();
            $NbrMembers = $members->count();
            if ($NbrMembers > 0) {
                # code...
                $part = $request->montant / $NbrMembers;

                foreach($members as $member){

                  if ($member->user_id != $request->payer_id) {
                    # code...
                    Paiment::create([
                      'amount' => $part,
                      'is_payed' => 'inpayed',
                      'from_id' => $member->user_id,  
                      'to_id' => $request->payer_id, 
                      'depense_id' => $depense->id,
                    ]);
                  }
                }
            }

            return to_route('colocation.show',$request->colocation_id);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $idColocation)
    {
        //
        $categories = Categorie::where('colocation_id','=',$idColocation)->get();
        $users = User_Colocation::with('user')->where('colocation_id','=',$idColocation)->get();
         
        return view('User/create-depense',compact('idColocation','categories','users'));

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Depense $depense)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Depense $depense)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        // dd($id);
        Depense::destroy($depense->id);
        return back();
    }
}
