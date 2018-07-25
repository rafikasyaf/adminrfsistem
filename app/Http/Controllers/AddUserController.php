<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use DB;

class AddUserController extends Controller
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
        return view('adduser');
    }

    

    public function store(Request $request)
    {
        $request->validate([
            'image' => 'required|image',
            'nik' => 'required',
            'name' => 'required',
            'job' => 'required',

        ]);
        
       $data = new Operator;
        if ($request->hasFile('image')) {
             $imageExtension = $request->file('image')->getClientOriginalExtension();
             $imageName = 'image_'.time().'.'.$imageExtension;
             $imageDestination = base_path().'/public/images';
             $request->file('image')->move($imageDestination, $imageName);
             $request->image = '/images/'.$imageName;
             $data->image=$request->image;
         }
        $data->nik=$request->nik;
        $data->name=$request->name;
        $data->job=$request->job;

        $cek = DB::table('operators')->where('nik', $request->nik)->get();
        if($cek->isEmpty()){
            $data->save();
            return redirect('adminuser')->with('success', 'Successfully Added.');
        }else{
            return redirect()->back()->with('error', 'Data already exists! Input again.');
        }
    }

    public function getImage()
    {
        $file = Operator::get('images/' . $imageName);
        return response()->json($file);
    }
}
