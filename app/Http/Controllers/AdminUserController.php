<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Operator;
use Excel;
use DB;

class AdminUserController extends Controller
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
        $data = Operator::all()->toArray();
        return view('adminuser')->with('data',$data);
    }

    public function edit($nik)
    {
        $data = Operator::find($nik);
        return view('adduser', compact('data'));
    }

    
    
    public function update(Request $request, $nik)
    {
        $data=Operator::find($nik);
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
        $data->save();
        return redirect('adminuser')->with('success', 'Successfully updated.');
    }  

    public function import(Request $request)
    {
        $this->validate($request, [
            'import' => 'required'
        ]);

        if ($request->hasFile('import')) {
            $path = $request->file('import')->getRealPath();

            $data = Excel::load($path, function($reader){})->get();
            $a = collect($data);

            if (!empty($a) && $a->count()) {
                foreach ($a as $key => $value) {
                    $insert[] = [
                            'nik' => $value->nik, 
                            'name' => $value->name, 
                            'job' => $value->job, 
                            'image' => $value->image,
                            ];
                    $cek1 = DB::table('devices')->where('id_rf', $value->id_rf)->get();
                    if($cek1->isEmpty()){
                        Operator::create($insert[$key]);
                        return back()->with('success', 'Successfully imported.');
                    }else{
                        return back()->with('error', 'Data already exists.');
                    }
                    
                        
                    }
            };
        }
        
    }
    
    public function exportFile()
    {
        $transaksi = Operator::get()->toArray();
        Excel::create('Operator Report', function($excel) use($transaksi){
        $excel->sheet('Operator Report Data', function ($sheet) use ($transaksi) {
            $sheet->fromArray($transaksi);
            });
        })->download("xlsx");
    }

    public function destroy($nik)
    {
        Operator::find($nik)->delete();
        return back()->with('success', 'Successfully deleted.');
    }


}
