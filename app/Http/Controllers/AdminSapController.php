<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Device;
use Excel;
use DB;

class AdminSapController extends Controller
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
        $data = Device::all()->toArray();
        return view('adminsap', compact('data'));
    }

    public function create()
    {
        return view('adddevice');
    }

    public function show($id_rf)
    {
        //
    }

    // public function edit($id_rf)
    // {
    //     $data=Device::find($id_rf);
    //     return view('adddevice', compact('data'));
    // } 

    // public function update(Request $request, $id_rf)
    // {
    //     $data=Device::find($id_rf);

    //     $data->id_rf=$request->id_rf;
    //     $data->brand=$request->brand;
    //     $data->model=$request->model;
    //     $data->property=$request->property;
    //     $data->station=$request->station;
    //     $data->status=$request->status;
    //     $data->save();
    //     return redirect('admindevice')->with('success', 'Successfully updated.');
        
    // }

    // public function import(Request $request)
    // {
    //     $this->validate($request, [
    //         'import' => 'required'
    //     ]);

    //     if ($request->hasFile('import')) {
    //         $path = $request->file('import')->getRealPath();

    //         $data = Excel::load($path, function($reader){})->get();
    //         $a = collect($data);

    //         if (!empty($a) && $a->count()) {
    //             foreach ($a as $key => $value) {
    //                 $insert[] = [
    //                         'id_rf' => $value->id_rf, 
    //                         'brand' => $value->brand, 
    //                         'model' => $value->model, 
    //                         'property' => $value->property,
    //                         'station' => $value->station, 
    //                         'status' => $value->status
    //                         ];
                    
    //                 $cek1 = DB::table('devices')->where('id_rf', $value->id_rf)->get();

    //                 if($cek1->isEmpty()){
    //                     Device::create($insert[$key]);
    //                     return back()->with('success', 'Successfully imported.');
    //                 }

    //                 else{
    //                     return back()->with('error', 'Data already exists.');
    //                 }         
    //             }
    //         };
    //     }        
    // }

    // public function exportFile()
    // {
    //     $transaksi = Device::get()->toArray();
    //     Excel::create('Device Report', function($excel) use($transaksi){
    //     $excel->sheet('Device Report Data', function ($sheet) use ($transaksi) {
    //         $sheet->fromArray($transaksi);
    //         });
    //     })->download("xlsx");
    // }

    // /**
    //  * Remove the specified resource from storage.
    //  *
    //  * @param  int  $id_rf
    //  * @return \Illuminate\Http\Response
    //  */
    // public function destroy($id_rf)
    // {
    //     Device::find($id_rf)->delete();
    //     return back()->with('error', 'Successfully deleted.');
    // }
}
