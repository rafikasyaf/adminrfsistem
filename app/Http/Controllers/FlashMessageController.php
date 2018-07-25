<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FlashMessageController extends Controller
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
        return view('/pesan');
    }

    public function indexadduser()
    {
        return view('/pesanadduser');
    }

    public function indexdevice()
    {
        return view('/pesandevice');
    }

    public function pesan()
    {
        return redirect('/pesan')->with(['success'=> 'Data added successfully.']);
    }

    public function pesanadduser()
    {
        return redirect('/pesanadduser')->with(['success'=> 'Data added successfully.']);
    }

    public function pesandevice()
    {
        return redirect('/pesandevice')->with(['success'=> 'Data added successfully.']);
    }
}
