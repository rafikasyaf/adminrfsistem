<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Excel;

class RfAdminController extends Controller
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
        
        $data = User::where('level','admin_rf')->get()->toArray();
        return view('adminrf')->with('data',$data);
    }

    public function edit($id_user)
    {
        $data = User::find($id_user);
        return view('addadmin', compact('data'));
    }

    
    
    public function update(Request $request, $id_user)
    {
        $data=User::find($id_user);
        if ($request->hasFile('image')) {
             $imageExtension = $request->file('image')->getClientOriginalExtension();
             $imageName = 'image_'.time().'.'.$imageExtension;
             $imageDestination = base_path().'/public/images';
             $request->file('image')->move($imageDestination, $imageName);
             $request->image = '/images/'.$imageName;
             $data->image=$request->image;
         }

        $data->name=$request->name;
        $data->username=$request->username;
        $data->password=$request->password;
        $data->id_user=$request->id_user;
        $data->station=$request->station;
        $data->save();
        return redirect('adminrf')->with('updated', 'Successfully updated.');
    }  

    public function exportFile()
    {
        $transaksi = User::where('level', 'admin_rf')->get()->toArray();
        Excel::create('Admin Rf Report', function($excel) use($transaksi){
        $excel->sheet('Admin Rf Report Data', function ($sheet) use ($transaksi) {
            $sheet->fromArray($transaksi);
            });
        })->download("xlsx");
    }

    public function destroy($id_user)
    {
        User::find($id_user)->delete();
        return back()->with('deleted', 'Successfully deleted.');
    }
}
