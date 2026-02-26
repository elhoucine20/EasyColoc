<?php

use App\Http\Controllers\CategorieController;
use App\Http\Controllers\ColocationController;
use App\Http\Controllers\DepenseController;
use App\Http\Controllers\loginController;
use App\Http\Controllers\registerController;
use App\Http\Controllers\userController;
use App\Http\Middleware\userMiddleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/register', [registerController::class, 'index'])->name('register');
Route::post('/register', [registerController::class, 'store'])->name('register');
Route::get('/login', [loginController::class, 'index'])->name('login');
Route::post('/login', [loginController::class, 'store'])->name('login');
Route::get('/login', [loginController::class, 'Logout'])->name('logout');


Route::middleware(userMiddleware::class)->group(function(){

    Route::get('/dashbord', [userController::class, 'index'])->name('dashbord-user');
    // colocation 
    Route::resource('colocation',ColocationController::class);
    Route::resource('categorie',CategorieController::class);
    Route::resource('depense',DepenseController::class);
});