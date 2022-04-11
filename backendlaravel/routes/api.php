<?php
use App\Http\Controllers\MemoireController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\DemandeDepotController;
use App\Http\Controllers\DemandeEmpruntController;
use App\Http\Controllers\EmpruntController;
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

   
  
});

Route::resource('Domaine',DomaineController::class);
Route::resource('DemandeDepot',DemandeDepotController::class);
Route::resource('DemandeEmprunt',DemandeEmpruntController::class);
Route::resource('Emprunt',EmpruntController::class);
Route::resource('Encadreurs',EncadreursController::class);
Route::resource('Etablisement',EtablisementsController::class);
Route::resource('Memoire',MemoireController::class);

Route::get('/Memoire',[MemoireController::class,'index']); 
Route::get('/Memoire/{memoire}/Emprunt',[EmpruntController::class,'byMemoire']);

Route::get('/Memoire/{memoire}/Domaine',[DomaineController::class,'byMemoire']);
Route::get('/Domaine/{Domaine}/Memoire',[MemoireController::class,'byDomaine']);
Route::get('/Memoire/{memoire}/DemandeEmprunt',[DemandeEmpruntController::class,'byMemoire']);
Route::get('/Etablisement/{etablisement}/Memoire',[MemoireController::class,'byEtablisement']);
Route::post('/logout', [AuthController::class, 'logout']);
 
