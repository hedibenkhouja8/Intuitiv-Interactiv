<?php
use App\Http\Controllers\MemoireController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\DemandeDepotController;
use App\Http\Controllers\DemandeEmpreintController;
use App\Http\Controllers\EmpreintController;
use App\Http\Controllers\EncadreursController;
use App\Http\Controllers\EtablisementsController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 
Route::resource('Memoire',MemoireController::class);
Route::resource('Critere',CritereController::class);
Route::resource('DemandeDepot',DemandeDepotController::class);
Route::resource('DemandeEmpreint',DemandeEmpreintController::class);
Route::resource('Empreint',EmpreintController::class);
Route::resource('Encadreurs',EncadreursController::class);
Route::resource('Etablisement',EtablisementsController::class);

Route::get('/Memoire',[MemoireController::class,'index']); 
//Route::post('/Memoire',[MemoireController::class,'store']);