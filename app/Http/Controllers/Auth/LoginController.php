<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    /**o
     * Where to redirect users after login.
     *
     * @var string
     */
    
    // protected $redirectTo = '/';
    protected function authenticated(Request $request, $user)
    {
        if($user->level=='admin_rf'){
            return redirect('rfdashb');
        }elseif ($user->level=='admin_system') {
            return redirect('dashb');
        }elseif ($user->level=='manager') {
            return redirect('mngrdashb');
        }
        dd($user);
        return redirect('/');
    }

    public function username()
    {
        return 'username';
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

}
