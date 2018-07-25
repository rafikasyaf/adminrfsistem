<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use App\Operator;
use App\Device;
use DateTime;
use DB;

class RfOutController extends Controller
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
        $out = Operator::where('nik','nik')->first();
        $out = Operator::all();
        return view('rfout', compact('out'));
    }

    public function getData($nik)
    {
        $tampil = Operator::find($nik);
        return response()->json($tampil);
    }

    public function getDevice($id_rf)
    {
        $tampil = Device::find($id_rf);
        return response()->json($tampil);

    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');
        $request->validate([
            'nik' => 'required',
            'id_rf' => 'required',
            'name' => 'required',
            'job' => 'required',
            'station' => 'required',
            'status' => 'required',
        ]);
        
        $add = new Transaction;
        $add->tgl_pinjam=date('Y-m-d H:i:s'); //nama yg depan itu nama yg ada di database
        $add->nik=$request->nik;
        $add->id_rf=$request->id_rf;
        $add->status='lended';

        // $add->save();

        // return redirect('rfout')->with('success', 'Transaction was successfully.');

        $cek1 = DB::table('operators')->where('nik', $request->nik)->get();
        $cek2 = DB::table('devices')->where('id_rf', $request->id_rf)->get();
        $cek5 = DB::table('devices')->where('id_rf', $request->id_rf)->where('status', 'ready')->get();
        $cek3 = DB::table('transactions')->where('id_rf', $request->id_rf)->where('status', 'lended')->get();
        $cek4 = DB::table('transactions')->where('nik', $request->nik)->where('status', 'lended')->get();

        // $cek2 = DB::table('transactions')->where('id_rf', $request->id_rf)->where('status', 'dipinjam')->get();
        // $cek3 = DB::table('transactions')->where('nik', $request->nik)->where('id_rf', $request->id_rf)->where('status', 'dipinjam')->get();
        // $cek5 = DB::table('transactions')->where('nik', $request->nik)->where('id_rf', $request->id_rf)->where('status', 'kembali')->get();
        // $cek4 = DB::table('transactions')->join('devices', 'transactions.id_rf', '=', 'devices.id_rf')->where('devices.status', 'ready')->get();
        
        if($cek1->isEmpty()){
            return redirect()->back()->with('error', 'Transaction failed! NIK not found.');
        }

        elseif ($cek2->isEmpty()) {
            return redirect()->back()->with('error', 'Transaction failed! Device not found.');
        }

        elseif ($cek5->isEmpty()) {
            return redirect()->back()->with('error', 'Transaction failed! Device is not ready.');
        }

        elseif ($cek3->isNotEmpty()) {
            return redirect()->back()->with('error', 'Transaction failed! Device is using.');
        }

        elseif ($cek4->isNotEmpty()) {
            return redirect()->back()->with('error', 'Transaction failed! Operator is borrowing.');
        }

        else{
            $add->save();
            return redirect('rfout')->with('success', 'Transaction was successfully.');
        }
        
    }
}
