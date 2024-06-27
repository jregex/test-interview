<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;
    protected $guarded = ['id_ujian'];
    public $timestamps = false;

    public function mapels()
    {
        return $this->belongsTo(Mapel::class,'id_matpel','id_matpel');
    }

    public function pesertas()
    {
        return $this->hasMany(Peserta::class,'id_ujian','id_ujian');
    }
}
