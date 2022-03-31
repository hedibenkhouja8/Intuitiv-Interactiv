<?php
use App\Http\Controllers\MemoireController;
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
//Route::get('/Memoire',[MemoireController::class,'index']); 
//Route::post('/Memoire',[MemoireController::class,'store']);