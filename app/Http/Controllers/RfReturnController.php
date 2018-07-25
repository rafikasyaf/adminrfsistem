<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;
use App\Operator;
use App\Device;
use DateTime;

class RfReturnController extends Controller
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
        $show = Transaction::where('status','lended')->get();
        return view('rfreturn', compact('show'));
    }

    public function update(Request $request, $nik)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'nik' => 'required',
            'id_rf' => 'required',
        ]);


        $transactions = Transaction::where('nik','=',$request->nik)->where('id_rf','=',$request->id_rf)->where('status','=',"lended")->first();

        if($transactions == null){
            return redirect()->back()->with('error', 'Return failed! Transaction does not exist.');
        }else{
            $transactions->tgl_kembali=date('Y-m-d H:i:s');
            $transactions->status="returned";
            $transactions->save();
            return redirect('rfreturn')->with('success', 'Return was succesfully.');
        } 

    }

    public function report(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'status' => 'required',
            'id_rf' => 'required',
            'nik' => 'required',
        ]);

        //$transactions = Transaction::all()->where('nik','=',$request->nik)->get()->first();
        // $device = DB::table('devices')->where('id_rf','=',$request->id_rf)->first();
        // $device->status=$request->status;
        // $device->save();

        $path = $request->get('status');
        $path2 = $request->get('other');

        $device = Device::where('id_rf','=',$request->id_rf)->first();

        $transactions = Transaction::where('nik','=',$request->nik)
                        ->where('id_rf','=',$request->id_rf)
                        ->where('status','=',"lended")->first();
        
        
        // $cek1 = DB::table('transactions')->where('nik', $request->nik)->where('id_rf', $request->id_rf)->first();
        if($transactions == null){
            return redirect()->back()->with('error', 'Report failed! NIK or ID RF does not exist.');
        }else{

            if($path == 'other'){
                $device->status=$path;
                $device->save();
                $transactions->status=$path;
                $transactions->tgl_kembali=date('Y-m-d H:i:s');
                $transactions->other=$path2;
                $transactions->save();
                return redirect('rfreturn')->with('success', 'Return was succesfully.');                
            }

            else{
                $device->status=$path;
                $device->save();
                $transactions->status=$path;
                $transactions->tgl_kembali=date('Y-m-d H:i:s');
                $transactions->save();
                return redirect('rfreturn')->with('success', 'Return was succesfully.'); 
            }
        }
        
    }

}
