<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
// use ConsoleTVs\Charts\Config\Charts;
use App\Charts\SampleChart;
use Charts;
use App\Transaction;
use DB;

class ChartController extends Controller
{
    public function index()
    {
    	$chart1 = \Chart::title([
        'text' => 'Weekly Transaction Average',
    ])
    ->chart([
        'type'     => 'line', // pie , columnt ect
        'renderTo' => 'chart1', // render the chart into your div with id
    ])
    ->subtitle([
        'text' => 'This Subtitle',
    ])
    ->colors([
        '#0c2959'
    ])
    ->xaxis([
        'categories' => [
            'Week I',
            'Week II',
            'Week III',
            'Week IV',
        ],
        'labels'     => [
            'rotation'  => 15,
            'align'     => 'top',
            'formatter' => 'startJs:function(){return this.value + " (Footbal Player)"}:endJs', 
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
                'data'  => [43934, 52503, 57177, 69658],
                // 'color' => '#0c2959',
            ],
        ]
    )
    ->display();

    return view('dashb')->with('chart1',$chart1);
    }
}