<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class VerifyController extends Controller
{
    public function getVerify()
    {
        return view('auth.verify_mail');
    }

    public function postVerify(Request $request)
    {
        if ($user = User::where('code', $request->code)->first()) {

            if($user->role_id == 2){
               $user->is_activated = 1;
               $user->code = null;
               $user->save(); 

               return redirect()->route('login')->with('success', 'Votre compte a été vérifié!');

            }else{
               $user->code = null;
               $user->save(); 

               return redirect()->route('login')->with('success', 'Votre compte a été vérifié!');
            }
            
        } else {
            return back()->with('error', 'Error Verification!');
        }
    }
}
