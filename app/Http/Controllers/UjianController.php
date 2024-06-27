<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use App\Models\Ujian;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index()
    {
        $data = [
            'title'=>'Ujian',
            'ujians'=>Ujian::with('mapels')->get(),
            'mapels'=>Mapel::get()
        ];
        return view('ujian.index',$data);
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_ujian'=>'required',
            'id_matpel'=>'required',
            'tanggal'=>'required'
        ]);
        $save=Ujian::create([
            'nama_ujian'=>$request->nama_ujian,
            'id_matpel'=>$request->id_matpel,
            'tanggal'=>date('Y-m-d H:i:s',strtotime($request->tanggal))
        ]);

        if($save){
            return redirect()->route('ujian.index');
        }else{
            return redirect()->back();
        }
    }

    public function delete(Ujian $ujian)
    {
        $delete = $ujian->delete();
        if($delete){
            return redirect()->route('ujian.index');
        }else{
            return redirect()->back();
        }
    }
}
