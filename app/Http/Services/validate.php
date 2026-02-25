<?php
namespace App\Http\Services;

class Validate{


   public static function ValidateUser($request){
          return $request->validate([
           'name' => 'required|string|between:3,30',
           'email' => 'required|string',
           'password' => 'required|string',
           'password2'=>'required|string',
        //    'role'=>'required|string',
       ]);
   }
   public static function ValidateColocationName($request){
      return $request->validate([
         'colocationName'=>'required|string|between:3,30'
      ]);
   }
   public static function validateNameCategorie($request){
      return $request->validate([
         'name'=>'required|string|between:3,30',
         'colocation_id'=>'required',
      ]);
   } 
}
?>