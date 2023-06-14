<?php

use App\Http\Controllers\AlatController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\JenisController;
use App\Http\Controllers\PeminjamanController;
use App\Http\Controllers\PeminjamController;
use App\Http\Controllers\ChecklistController;
use App\Http\Controllers\CustController;
use App\Models\Checklist;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('kelolakuy');
});

Auth::routes();

/*------------------------------------------
--------------------------------------------
All Normal Users Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:user'])->group(function () {
  
    Route::get('/home', [HomeController::class, 'index'])->name('home');
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin.home');
});

Route::resource('kategori', KategoriController::class);
Route::get('/searchKategori', [KategoriController::class, 'search'])->name('searchKategori');

Route::resource('jenis', JenisController::class);
Route::get('/searchJenis', [JenisController::class, 'search'])->name('searchJenis');

Route::resource('peminjam', PeminjamController::class);
Route::get('/search', [PeminjamController::class, 'search'])->name('search');

Route::resource('alat', AlatController::class);
Route::get('/searchAlat', [AlatController::class, 'search'])->name('searchAlat');

Route::resource('peminjaman', PeminjamanController::class);

Route::resource('checklist', ChecklistController::class);
Route::get('cetak', [ChecklistController::class, 'cetak'])->name('cetak');

Route::get('alatCust', [AlatController::class, 'indexCust'])->name('alatCust');

Route::resource('tracking', CustController::class);
Route::get('/searchTracking', [CustController::class, 'tracking']);
Route::get('/tracking', [CustController::class, 'search'])->name('tracking');
