<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mapel extends Model
{
    use HasFactory;
    protected $guarded = ['id_matpel'];

    public function ujian()
    {
        return $this->belongsTo(Ujian::class);
    }
}
