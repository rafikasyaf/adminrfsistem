<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;
use Excel;
use App\Exports\DataExport;

class ReportController extends Controller
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
        $show = DB::table('transactions')
                ->join('devices', 'transactions.id_rf', '=', 'devices.id_rf')
                ->join('operators', 'transactions.nik', '=', 'operators.nik')
                ->select('transactions.*', 'devices.station', 'operators.name')
                ->get()
                ->toArray();
        
        return view('report', compact('show'));
    }

    public function exportFile(Request $request)
    {
        $path1 = $request->get('tgl_awal');
        $path = $request->get('tgl_akhir');
        // $nama = 'laporan_transaksi_'.date('Y-m-d_H-i-s');
        if(!empty($path1) && !empty($path)){

        $transaksi = Transaction::whereBetween('tgl_pinjam',[$path1,$path])->get()->toArray();
        Excel::create('transaction', function($excel) use($transaksi){
        $excel->sheet('Transaction  Report', function ($sheet) use ($transaksi) {
            $sheet->fromArray($transaksi);
            });
        })->download("xlsx");
        }

        else{
        $transaksi = Transaction::get()->toArray();
        Excel::create('transaction', function($excel) use($transaksi){
        $excel->sheet('Transaction Report', function ($sheet) use ($transaksi) {
            $sheet->fromArray($transaksi);
            });
        })->download("xlsx");
        }
    }
}
