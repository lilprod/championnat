<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    /*public function login(Request $request)
    {
        $this->validateLogin($request);
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);

            return $this->sendLockoutResponse($request);
        }

        //-----------------------------

        if ($this->guard()->validate($this->credentials($request))) {
            $user = $this->guard()->getLastAttempted();
            if ($user->is_activated && $this->attemptLogin($request)) {
                return $this->sendLoginResponse($request);
            } else {
                $this->incrementLoginAttempts($request);
                $user->code = SendCode::sendCode($user->email, $user->phone_number);
                if ($user->save()) {
                    return redirect('/verify?email='.$user->email.'&phone_number='.$user->phone_number);
                }
            }
        }

        //--------------------------

        $this->IncrementLoginAttempts($request);

        return $this->sendFailedLoginResponse($request);
    }*/


    protected function sendFailedLoginResponse(Request $request)
    {
        $errors = [$this->username() => trans('auth.failed')];
 
        // Fetching user from database
        
        $user = User::where($this->username(), $request->{$this->username()})->first();

        // Checking if user is sucessfully logged in, if login is sucessfull

        // and status is false i.e. 0 w will override the default error message

        if($user && Hash::check($request->password, $user->password) && $user->is_activated !=1){
            
            $errors = [$this->username() => 'Votre compte n\'est pas encore actif! Nos adnistrateurs s\'en chargeront dès que vos informations ont été vérifiées'];
        }
 
        if ($request->expectsJson()) {
            # code...
            return response()->json($errors,422);
        }
 
        return redirect()->back()->withInput($request->only($this->username(), 'remember'))->withErrors($errors);
    }
}
