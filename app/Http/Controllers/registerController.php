<?php

namespace App\Http\Controllers;

use App\Http\Services\Validate;
use App\Models\User;
use Illuminate\Http\Request;

class registerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth/register');
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
        //
        // dd($request->post());
        // dd("register");

        if ($request) {
            # code...
            $password1 = $request->password;
            $password2 = $request->password2;
            if ($password1 == $password2) {
                # code...
                Validate::ValidateUser($request);

                User::create([
                    'name'=>$request->name,
                    'email'=>$request->email,
                    'password'=>$request->password,
                    // 'role'=>""
                    // 'statu'=>"",
                    // 'evaluation'=>"",

                ]);
                return view("auth/login");
            }else{
                return back()->with("confirmer your password");

            }
        }else{
            return view('auth/register');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
