<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('auth/login');
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
        // dd("login");

        $email = $request->email;
        $password = $request->password;
        $credentials = ['email'=>$email,'password'=>$password];
        if (Auth::attempt($credentials)) {
            # code...
            if (Auth::user()->role=="user") {
                # code...
                $request->session()->regenerate();
                return redirect()->route("dashbord-user");
            }else if (Auth::user()->role == "admin") {
                # code...
                $request->session()->regenerate();
                return redirect()->route('dashbord-admin');
            }else{
                return view("auth/login");
            }
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

        public function Logout()
    {
        Auth::logout();
        return $this->index();
    }
}
