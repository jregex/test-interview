<?php

namespace App\Http\Controllers;

use App\Models\Ujian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index(Request $request)
    {
        $tanggal = date('Y-m-d',strtotime($request->tanggal));
        if(isset($request->tanggal)){
            $ujians = Ujian::with(['mapels','pesertas'])->withCount('pesertas')->where('tanggal','like','%'.$tanggal.'%')->get();
        }else{
            $ujians = Ujian::with(['mapels','pesertas'])->withCount('pesertas')->get();
        }
        $data = [
            'title'=>'Sistem Informasi Akademik',
            'ujians'=>$ujians
        ];
        // dd($data['ujians']);
        return view('index',$data);
    }

    public function detail($id)
    {
        $query = DB::raw("siswas.nama,mapels.nama_matpel,(CASE WHEN nilai>=80 THEN 'lulus' ELSE 'tidak lulus' END) as status");
        $detail = DB::table('pesertas')->select($query)
                        ->join('siswas','siswas.nis','=','pesertas.nis')
                        ->join('ujians','ujians.id_ujian','=','pesertas.id_ujian')
                        ->join('mapels','mapels.id_matpel','=','ujians.id_matpel')
                        ->where('pesertas.id',$id)
                        ->get();
        // if($detail->nilai >= 75){
        //     $kat = "Lulus";
        // }else{
        //     $kat = "Tidak Lulus";
        // }

        $data = [
            'title'=>'Detail',
            'peserta'=>$detail
        ];
        return view('detail',$data);
    }
}
