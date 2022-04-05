<?php
use App\Http\Controllers\MemoireController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\DemandeDepotController;
use App\Http\Controllers\DemandeEmpreintController;
use App\Http\Controllers\EmpreintController;
use App\Http\Controllers\EncadreursController;
use App\Http\Controllers\EtablisementsController;
use Illuminate\Http\Request;
use App\Http\Controllers\AuthController;
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
//public

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);

//protected routes LOGIN

Route::group(['middleware' => ['auth:sanctum']], function () {

    Route::resource('Memoire',MemoireController::class);
    Route::resource('Critere',CritereController::class);
Route::resource('DemandeDepot',DemandeDepotController::class);
Route::resource('DemandeEmpreint',DemandeEmpreintController::class);
Route::resource('Empreint',EmpreintController::class);
Route::resource('Encadreurs',EncadreursController::class);
Route::resource('Etablisement',EtablisementsController::class);

Route::get('/Memoire',[MemoireController::class,'index']); 
Route::get('/Memoire/{memoire}/Empreint',[EmpreintController::class,'byMemoire']);

Route::get('/Memoire/{memoire}/Critere',[CritereController::class,'byMemoire']);
Route::get('/Critere/{Critere}/Memoire',[MemoireController::class,'byCritere']);
Route::get('/Memoire/{memoire}/DemandeEmpreint',[DemandeEmpreintController::class,'byMemoire']);
Route::get('/Etablisement/{etablisement}/Memoire',[MemoireController::class,'byEtablisement']);
    Route::post('/logout', [AuthController::class, 'logout']);
});


 
