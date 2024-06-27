<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use Illuminate\Http\Request;

class SiswaController extends Controller
{
    public function index()
    {
        $data = [
            'title'=>'Siswa',
            'siswas'=>Siswa::get()
        ];
        return view('siswa.index',$data);
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'nis'=>'required',
            'nama'=>'required',
            'alamat'=>'required'
        ]);

        $save=Siswa::create($validated);

        if($save){
            return redirect()->route('siswa.index');
        }else{
            return redirect()->back();
        }
    }

    public function edit(Siswa $siswa)
    {
        $data = [
            'title'=>'Edit Siswa',
            'siswa'=>$siswa
        ];
        return view('siswa.edit',$data);
    }

    public function update(Request $request,Siswa $siswa)
    {
        $validated=$request->validate([
            'nis'=>'required',
            'nama'=>'required',
            'alamat'=>'required'
        ]);

        $update=Siswa::where('id',$siswa->id)->update($validated);
        if($update){
            return redirect()->route('siswa.index');
        }else{
            return redirect()->back();
        }
    }

    public function delete(Siswa $siswa)
    {
        $delete = $siswa->delete();
        if($delete){
            return redirect()->route('siswa.index');
        }else{
            return redirect()->back();
        }
    }
}
