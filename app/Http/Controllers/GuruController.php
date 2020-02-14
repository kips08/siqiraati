<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Guru;
use DataTables;

class GuruController extends Controller
{
    //
    public function json(){
        return Datatables::of(Guru::all())->make(true);
    }

    public function index(){
        return view('foto');
    }

    public function edit($id)
    {
        // mengambil data pegawai berdasarkan id yang dipilih
        $guru = Guru::where('id_guru', $id)->get();
        // passing data pegawai yang didapat ke view edit.blade.php
        return view('edit',['guru' => $guru]);
    
    }

    public function imageUploadPost(Request $request)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $imageName = $request->id.'.'.$request->image->extension();  
        
        $flight = Guru::find($request->id);

        $flight->foto = $imageName;

        $flight->save();

        $request->image->move(public_path('images'), $imageName);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
   
    }
}
