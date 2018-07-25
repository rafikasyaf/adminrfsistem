<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Charts;
use App\Transaction;
use YEAR;

class RfDashbController extends Controller
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
        $total = DB::table('devices')->count();
        $lend = DB::table('transactions')->count();
        $available = DB::table('devices')->where('status','ready')->count();
        $broken = DB::table('devices')->where('status','broken')->count();
        $transaksi1 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','01')->count();
        $transaksi2 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','02')->count();
        $transaksi3 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','03')->count();
        $transaksi4 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','04')->count();
        $transaksi5 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','05')->count();
        $transaksi6 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','06')->count();
        $transaksi7 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','07')->count();
        $transaksi8 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','08')->count();
        $transaksi9 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','09')->count();
        $transaksi10 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','10')->count();
        $transaksi11 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','11')->count();
        $transaksi12 = DB::table('transactions')->whereYear('tgl_pinjam',date('Y'))->whereMonth('tgl_pinjam','12')->count();
        
        $chart1 = \Chart::title([
        'text' => 'Weekly Transaction Average',
    ])
    ->chart([
        'type'     => 'line', // pie , columnt ect
        'renderTo' => 'chart1', // render the chart into your div with id
    ])
    ->subtitle([
        'text' => 'PT LINFOX LOGISTICS INDONESIA',
    ])
    ->colors([
        '#0c2959'
    ])
    ->xaxis([
        'categories' => [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
            'July',
            'August',
            'September',
            'October',
            'November',
            'December',
        ],
        'labels'     => [
            'rotation'  => 15,
            'align'     => 'top',
            'formatter' => 'startJs:function(){return this.value}:endJs', 
            // use 'startJs:yourjavasscripthere:endJs'
        ],
    ])
    ->yaxis([
        'text' => 'This Y Axis',
    ])
    ->legend([
        'layout'        => 'vertikal',
        'align'         => 'right',
        'verticalAlign' => 'middle',
    ])
    ->series(
        [
            [
                'name'  => 'Transaction Average',
                'data'  => [$transaksi1,$transaksi2,$transaksi3,$transaksi4,$transaksi5,$transaksi6,$transaksi7,$transaksi8,$transaksi9,$transaksi10,$transaksi11,$transaksi12],
                // 'color' => '#0c2959',
            ],
        ]
    )
    ->display();


        return view('rfdashb', compact('total','lend','available','broken','chart1'));
    }


    
}
