<?php

namespace App\Http\Controllers;

use App\Mail\InvitationMail;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
// 
use App\Models\Colocation;

class InvitationController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     */
    
    public function index()
    {
        //
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
    public function store(Request $request)
    {
        
        // dd($request->post());

                $request->validate([
                'email'=> 'required|email|max:200'
                ]);
                $token = Str::random(10);

                 $invitation = Invitation::create([
                    'email'=>$request->email,
                    'token'=>$token,
                    'colocation_id'=>$request->colocation_id,
                    'statu'=>'pending',
                ]);
                
                Mail::to($invitation->email)->send(new InvitationMail($token));
                // return to_route('colocation.show',$request->colocation_id);
                return to_route('dashbord-user');

                }

    /**
     * Display the specified resource.
     */
    public function show(string $idColocation)
    {
        //
        return view('User/create-invitation',compact('idColocation'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Invitation $invitation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Invitation $invitation)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Invitation $invitation)
    {
        //
    }

    public function accept($token)
    {

        $invitation = Invitation::where('token', $token)
        ->where('statu', 'pending')->firstOrFail();
        $user = Auth::user();
        $userColocation = $user->colocations();
        // if($userColocation->where('statu','active')->exists()){
        //     return redirect()->route('dashbord-user')->with('error','Vous avez deja une colocation active');
        //     }
        $colocation = $invitation->colocation;
        $colocation->members()->attach($user->id, [
            'type' => 'member',
            'joined_at' => now()
            ]);
            $invitation->colocation->members()->attach($user->id, [
                'type'=>'member',
                'joined_at'=> now()
                ]);
                $invitation->update(['statu', 'accepted']);
                // dd('hello invitation to accepted2');
        return redirect()->route('colocation.show',$invitation->colocation);    
    }

}
