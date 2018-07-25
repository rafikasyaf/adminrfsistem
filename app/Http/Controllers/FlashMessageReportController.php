<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlashMessageReportController extends Controller
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
        return view('rfadmin/pesanreport');
    }

    public function pesanreport()
    {
        return redirect('/pesanreport')->with(['success'=> 'Data added successfully.']);
    }
}
