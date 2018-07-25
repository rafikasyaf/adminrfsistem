<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Hash;
use Auth;

class LoginController extends Controller
{
    public function postlogin(Request $request){
        $user=User::where('username',$request->username)->first();
        if(count($user)==0){
            return back();
        }
        else{
            if(\Hash::check($request->password,$user->password)){
                \Auth::login($user);

                if($user->level=='admin_rf'){
                    return redirect('rfdashb');
                }
                elseif ($user->level=='admin_system') {
                    return redirect('dashb');
                }
                elseif ($user->level=='manager') {
                    return redirect('mngrdashb');
                }
                else{
                    return abort(404);
                }
            }
        }
    return back();
    }

    public function logout(){
        \Auth::logout();
        return redirect('/');
    }

    public function index()
    {
        return view('auth/login');
    }
}
