<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaction;
use DB;
use Excel;
use App\Exports\DataExport;

class RfReportController extends Controller
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

    public function index()
    {
        // $show = Transaction::all()->toArray();
        // return view('rfreport')->with('show', $show);
        $show = DB::table('transactions')
                ->join('devices', 'transactions.id_rf', '=', 'devices.id_rf')
                ->join('operators', 'transactions.nik', '=', 'operators.nik')
                ->select('transactions.*', 'devices.station', 'operators.name')
                ->get()
                ->toArray();
        return view('rfreport', compact('show'));
    }

    public function export()
    {
        $transaksi = Transaction::get()->toArray();
        Excel::create('transaction', function($excel) use($transaksi){
        $excel->sheet('Laporan Data Transaksi', function ($sheet) use ($transaksi) {
            $sheet->fromArray($transaksi);
            });
        })->download("xlsx");
    }
}
