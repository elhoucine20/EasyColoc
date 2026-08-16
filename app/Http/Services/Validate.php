<?php
namespace App\Http\Services;

use Illuminate\Support\Facades\Auth;

use function Laravel\Prompts\error;

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
   public static function ColocationsStatuIsActive($user){
         $IsActive = $user->colocations()->where('colocations.statu','=','active')->exists();
            if ($IsActive) {
               return back();
            }
   }

   // public static function validateDepense($request){
      //    return $request->validate([
         //         'title' => 'required|string',
         //         'montant' => 'required|integer',
         //         'date' => 'required',
         //         'categorie_id'=>'required',
         //         'payer_id'=>'required',
         //         'colocation_id'=>'required',
         
         //    ]);
         // } 
         // public function cree()
         public function CalculeAmount( string $montant,int $members){
            return $montant/$members;
         }
}
?>