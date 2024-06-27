<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UjianController;
use App\Http\Controllers\PesertaController;
use Illuminate\Http\Request;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomeController::class, 'index'])->name('home.index');
Route::get('/detail/{id}',[HomeController::class, 'detail'])->name('ujian.detail');
Route::get('/algo',fn() => view('algo-balik'));
Route::post('/algo', function(Request $request){
    function balik($str) {
        if (strlen($str) <= 1) {
            return $str;
        } else {
            return $str[strlen($str) - 1] . balik(substr($str, 0, strlen($str) - 1));
        }
    }
    echo "Hasil : ".balik($request->string);
})->name('algo.balik');
Route::get('/tgl-lahir',fn()=>view('tgl-lahir'));
Route::post('/tgl-lahir',function(Request $request){
    $tgl_lahir = DateTime::createFromFormat('Y-m-d',$request->tgl);
    $sekarang = new DateTime('now');
    $umur=date_diff($sekarang,$tgl_lahir);
    echo "Umur : ".$umur->format('%y Tahun %m Bulan %d Hari');
})->name('tgllahir');

Route::get('/siswa', [SiswaController::class, 'index'])->name('siswa.index');
Route::post('/siswa',[SiswaController::class, 'store'])->name('siswa.store');
Route::delete('/siswa/{siswa}',[SiswaController::class, 'delete'])->name('siswa.delete');
Route::get('/siswa/{siswa}/edit',[SiswaController::class, 'edit'])->name('siswa.edit');
Route::patch('/siswa/{siswa}',[SiswaController::class, 'update'])->name('siswa.update');

Route::get('/mapel', [MapelController::class, 'index'])->name('mapel.index');
Route::post('/mapel',[MapelController::class, 'store'])->name('mapel.store');
Route::delete('/mapel/{mapel}',[MapelController::class, 'delete'])->name('mapel.delete');

Route::get('/ujian', [UjianController::class, 'index'])->name('ujian.index');
Route::post('/ujian',[UjianController::class, 'store'])->name('ujian.store');
Route::delete('/ujian/{ujian}',[UjianController::class, 'delete'])->name('ujian.delete');

Route::get('/peserta', [PesertaController::class, 'index'])->name('peserta.index');
Route::post('/peserta',[PesertaController::class, 'store'])->name('peserta.store');
Route::delete('/peserta/{peserta}',[PesertaController::class, 'delete'])->name('peserta.delete');
Route::get('/peserta/{peserta}/edit',[PesertaController::class, 'edit'])->name('peserta.edit');
Route::patch('/peserta/{peserta}',[PesertaController::class, 'update'])->name('peserta.update');
