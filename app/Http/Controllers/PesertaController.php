<?php

namespace App\Http\Controllers;

use App\Models\Peserta;
use App\Models\Siswa;
use App\Models\Ujian;
use Illuminate\Http\Request;

class PesertaController extends Controller
{
    public function index()
    {
        $data = [
            'title'=>'Peserta',
            'siswas'=>Siswa::get(),
            'ujians'=>Ujian::get(),
            'pesertas'=>Peserta::with(['siswa','ujian'])->get()
        ];
        return view('peserta.index',$data);
    }
    public function store(Request $request)
    {
        $validated=$request->validate([
            'nis'=>'required',
            'id_ujian'=>'required',
            'nilai'=>'required'
        ]);

        $save=Peserta::create($validated);

        if($save){
            return redirect()->route('peserta.index');
        }else{
            return redirect()->back();
        }
    }

    public function edit(Peserta $peserta)
    {
        $data = [
            'title'=>'Edit Peserta',
            'siswas'=>Siswa::get(),
            'ujians'=>Ujian::get(),
            'peserta'=>$peserta
        ];
        return view('peserta.edit',$data);
    }

    public function update(Request $request,Peserta $peserta)
    {
        $validated=$request->validate([
            'id_ujian'=>'required',
            'nis'=>'required',
            'nilai'=>'required'
        ]);

        $update=Peserta::where('id',$peserta->id)->update($validated);
        if($update){
            return redirect()->route('peserta.index');
        }else{
            return redirect()->back();
        }
    }

    public function delete(Peserta $peserta)
    {
        $delete = $peserta->delete();
        if($delete){
            return redirect()->route('peserta.index');
        }else{
            return redirect()->back();
        }
    }
}
