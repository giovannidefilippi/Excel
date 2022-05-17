<?php

use App\Http\Controllers\GaraController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', [HomeController::class,'index'])->name('home');

Route::get('/importazione',
    function () {
        return view('importazione');
    })->name('importazione');
Route::post('/import',[HomeController::class,'import'])->name('gara.import');

Route::resource('gare', 'GaraController');
Route::resource('note', 'NotaController');
Route::resource('quotazioni', 'QuotazioneController');

Route::get('/NuoveGare', [GaraController::class,'nuovaGara'])->name('nuovaGara');
Route::get('/InValutazione', [GaraController::class,'inValutazione'])->name('inValutazione');
Route::get('/RichiestaChiarimenti', [GaraController::class,'richiestaChiarimenti'])->name('richiestaChiarimenti');
Route::get('/RichiestaQuotazione', [GaraController::class,'richiestaQuotazione'])->name('richiestaQuotazione');
Route::get('/QuotazioneRicevuta', [GaraController::class,'quotazioneRicevuta'])->name('quotazioneRicevuta');
Route::get('/AttesaPrezzoUscita', [GaraController::class,'attesaPrezzoUscita'])->name('attesaPrezzoUscita');
Route::get('/DaPartecipare', [GaraController::class,'daPartecipare'])->name('daPartecipare');
Route::get('/Partecipata', [GaraController::class,'partecipata'])->name('partecipata');
Route::get('/Revocata', [GaraController::class,'revocata'])->name('revocata');
Route::get('/Scartata', [GaraController::class,'scartata'])->name('scartata');
Route::get('/Eliminata', [GaraController::class,'eliminata'])->name('eliminata');

Route::get('/CreaCartella/{rdoelotto}/{id}/', [GaraController::class,'creaCartella'])->name('creaCartella');
Route::get('/ApriCartella/{percorsocartella}', [GaraController::class,'apriCartella'])->name('apriCartella');
