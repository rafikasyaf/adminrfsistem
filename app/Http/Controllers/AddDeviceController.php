<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use DB;

class AddDeviceController extends Controller
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
        $data=Device::all();
        return view('adddevice', compact('data'));
    }



    public function store(Request $request)
    {
        $request->validate([
            'id_rf' => 'required',
            'brand' => 'required',
            'model' => 'required',
            'property' => 'required',
            'station' => 'required',
            'status' => 'required',
        ]);

       $data = new Device;
        $data->id_rf=$request->id_rf;
        $data->brand=$request->brand;
        $data->model=$request->model;
        $data->property=$request->property;
        $data->station=$request->station;
        $data->status=$request->status;

        $cek = DB::table('devices')->where('id_rf', $request->id_rf)->get();
        if($cek->isEmpty()){
            $data->save();
            return redirect('admindevice')->with('success', 'Successfully Added.');
        }else{
            return redirect()->back()->with('error', 'Data already exists! Input again.');
        }
    }
    
}
