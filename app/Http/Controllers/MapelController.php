<?php

namespace App\Http\Controllers;

use App\Models\Mapel;
use Illuminate\Http\Request;

class MapelController extends Controller
{
    public function index()
    {
        $data = [
            'title'=>'Mata Pelajaran',
            'mapels'=>Mapel::get()
        ];
        return view('mapel.index',$data);
    }

    public function store(Request $request)
    {
        $validated=$request->validate([
            'nama_matpel'=>'required'
        ]);

        $save=Mapel::create($validated);

        if($save){
            return redirect()->route('mapel.index');
        }else{
            return redirect()->back();
        }
    }

    public function delete(Mapel $mapel)
    {
        $delete = $mapel->delete();
        if($delete){
            return redirect()->route('mapel.index');
        }else{
            return redirect()->back();
        }
    }
}
