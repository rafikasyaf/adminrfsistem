<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\User;
use Hash;
use DB;

class AddSapController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('addsap');
    }


    // public function store(Request $request)
    // {
    //     $request->validate([
    //         'image' => 'required|image|max:2048',
    //         'image.max(2048)' => 'Size max 2 MB!',
    //         'name' => 'required',
    //         'username' => 'required',
    //         'password' => 'required',
    //         'id_user' => 'required',
    //         'station' => 'required',
    //     ]);

    //    $add = new User;
    //     if ($request->hasFile('image')) {
    //          $imageExtension = $request->file('image')->getClientOriginalExtension();
    //          $imageName = 'image_'.time().'.'.$imageExtension;
    //          $imageDestination = base_path().'/public/images';
    //          $request->file('image')->move($imageDestination, $imageName);
    //          $request->image = '/images/'.$imageName;
    //          $add->image=$request->image;
             
    //      }
    //     $add->name=$request->name;
    //     $add->username=$request->username;
    //     $add->password= Hash::make('password');
    //     $add->id_user=$request->id_user;
    //     $add->station=$request->station;
    //     $add->level='admin_rf';

    //     $cek = DB::table('users')->where('id_user', $request->id_user)->get();
    //     if($cek->isEmpty()){
    //         $add->save();
    //         return redirect('adminrf')->with('success', 'Successfully Added.');
    //     }else{
    //         return redirect()->back()->with('error', 'Data already exists! Input again.');
    //     }
    // }
}
