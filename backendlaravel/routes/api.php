<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DomainController;
use App\Http\Controllers\CritereController;
use App\Http\Controllers\DomaineController;
use App\Http\Controllers\EmpruntController;
use App\Http\Controllers\MemoireController;
use App\Http\Controllers\EncadreursController;
use App\Http\Controllers\EntrepriseController;
use App\Http\Controllers\DemandeDepotController;
use App\Http\Controllers\EtablisementsController;
use App\Http\Controllers\DemandeEmpruntController;

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



//protected routes LOGIN

Route::group(['middleware' => ['auth:sanctum']], function () {

});
//public

Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::get('/frequentEtab', [AuthController::class, 'frequentEtab']);



Route::resource('Domaine',DomaineController::class);

Route::resource('DemandeDepot',DemandeDepotController::class);
Route::resource('DemandeEmprunt',DemandeEmpruntController::class);
Route::resource('Emprunt',EmpruntController::class);
Route::resource('Encadreur',EncadreursController::class);
Route::resource('Etablisement',EtablisementsController::class);

Route::resource('Entreprise',EntrepriseController::class);
Route::get('/Entreprise/search/{name}', [EntrepriseController::class, 'search']);
Route::resource('Memoire',MemoireController::class);

Route::get('/Memoire',[MemoireController::class,'index']); 
Route::get('/Memoire/{memoire}/Emprunt',[EmpruntController::class,'byMemoire']);

Route::get('/Domaine/{domaine}/Critere',[DomaineController::class,'byDomaine']);

Route::get('/Memoire/{memoire}/DemandeEmprunt',[DemandeEmpruntController::class,'byMemoire']);

Route::get('/DemandeEmpruntAccepted',[DemandeEmpruntController::class,'DemandeEmpruntsAccepted']);

Route::get('/Memoire/{memoire}/DemandeDepot',[MemoireController::class,'byDemande']);

Route::get('/recentDemandeEmprunts',[DemandeEmpruntController::class,'recentDemandeEmprunts']);

Route::get('/recentDemandeDepots',[DemandeDepotController::class,'recentDemandeDepots']);

Route::get('/DemandeDepotDetails/{demandedepot}',[DemandeDepotController::class,'DemandeDepotDetails']);

Route::post('/DemandeDepotaccept/{demandedepot}',[DemandeDepotController::class,'DemandeDepotaccept']);

Route::post('/DemandeDepotrefuse/{demandedepot}',[DemandeDepotController::class,'DemandeDepotrefuse']);

Route::get('/DemandeEmpruntDetails/{demandeemprunt}',[DemandeEmpruntController::class,'DemandeEmpruntDetails']);

Route::post('/DemandeEmpruntaccept/{demandeemprunt}',[DemandeEmpruntController::class,'DemandeEmpruntaccept']);
Route::post('/DemandeEmpruntrefuse/{demandeemprunt}',[DemandeEmpruntController::class,'DemandeEmpruntrefuse']);



Route::get('/Etablisement/{etablisement}/DemandeDepot',[DemandeDepotController::class,'byEtablisement']);

Route::get('/Etablisement/{etablisement}/User',[AuthController::class,'byEtablisement']);

Route::get('/User',[AuthController::class,'users']);

Route::get('/UserJoin/{user}',[DemandeEmpruntController::class,'X']);

Route::get('/User/Recents',[AuthController::class,'Recentusers']);
Route::get('/User/{user}',[AuthController::class,'userById']);

Route::get('/DemandeNonAccepte',[DemandeDepotController::class,'notAccepted']);


Route::get('/Etablisement/{etablisement}/Encadreur',[EncadreursController::class,'byEtablisement']);

Route::get('/Emprunt/{emprunt}/Memoire',[EmpruntController::class,'byEmprunt']);
Route::get('/Domaine/{domaine}/Memoire',[MemoireController::class,'byDomaine']);
Route::get('/MemoireAccepted',[MemoireController::class,'MemoireAccepted']);

Route::get('/MemoireDeMemeDomaine/{demandedepot}',[MemoireController::class,'MemoireDeMemeDomaine']);

Route::get('/User/{user}/DemandeEmprunt',[DemandeEmpruntController::class,'byUser']);

Route::get('/User/{user}/DemandeDepot',[DemandeDepotController::class,'byUser']);

Route::get('/User/{user}/AccepteDemandeDepot',[DemandeDepotController::class,'acceptebyUser']);



Route::get('/User/{user}/nbEmpruntparUserAccepte',[DemandeEmpruntController::class,'nbEmpruntparUserAccepte']);
Route::get('/User/{user}/nbEmpruntparUserRefuse',[DemandeEmpruntController::class,'nbEmpruntparUserRefuse']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/informatique', [MemoireController::class, 'MemoireInformatique']);

Route::get('/X', [DemandeEmpruntController::class, 'X']);
Route::get('/physique', [MemoireController::class, 'MemoirePhysique']);
Route::get('/chimie', [MemoireController::class, 'MemoireChimie']);
Route::get('/math', [MemoireController::class, 'MemoireMath']);
Route::get('/autre', [MemoireController::class, 'MemoireAutre']);
 
Route::resource('Etablisement',EtablisementsController::class);

////////////////////////////////////////////////////////////////

Route::resource('Domaine',DomaineController::class);

Route::resource('DemandeDepot',DemandeDepotController::class);
Route::resource('DemandeEmprunt',DemandeEmpruntController::class);
Route::resource('Emprunt',EmpruntController::class);
Route::resource('Encadreurs',EncadreursController::class);

Route::resource('Entreprise',EntrepriseController::class);
Route::get('/Entreprise/search/{name}', [EntrepriseController::class, 'search']);
Route::resource('Memoire',MemoireController::class);

Route::get('/Memoire',[MemoireController::class,'index']); 
Route::get('/Memoire/{memoire}/Emprunt',[EmpruntController::class,'byMemoire']);

Route::get('/Domaine/{domaine}/Critere',[DomaineController::class,'byDomaine']);

Route::get('/Memoire/{memoire}/DemandeEmprunt',[DemandeEmpruntController::class,'byMemoire']);

Route::get('/Memoire/{memoire}/DemandeDepot',[MemoireController::class,'byDemande']);

Route::get('/recentDemandeEmprunts',[DemandeEmpruntController::class,'recentDemandeEmprunts']);

Route::get('/recentDemandeDepots',[DemandeDepotController::class,'recentDemandeDepots']);

Route::get('/DemandeDepotDetails/{demandedepot}',[DemandeDepotController::class,'DemandeDepotDetails']);

Route::post('/DemandeDepotaccept/{demandedepot}',[DemandeDepotController::class,'DemandeDepotaccept']);

Route::post('/DemandeDepotrefuse/{demandedepot}',[DemandeDepotController::class,'DemandeDepotrefuse']);

Route::get('/DemandeEmpruntDetails/{demandeemprunt}',[DemandeEmpruntController::class,'DemandeEmpruntDetails']);

Route::post('/DemandeEmpruntaccept/{demandeemprunt}',[DemandeEmpruntController::class,'DemandeEmpruntaccept']);
Route::post('/DemandeEmpruntrefuse/{demandeemprunt}',[DemandeEmpruntController::class,'DemandeEmpruntrefuse']);



Route::get('/Etablisement/{etablisement}/DemandeDepot',[DemandeDepotController::class,'byEtablisement']);

Route::get('/Etablisement/{etablisement}/User',[AuthController::class,'byEtablisement']);

Route::get('/User',[AuthController::class,'users']);

Route::get('/UserJoin/{user}',[DemandeEmpruntController::class,'X']);

Route::get('/User/Recents',[AuthController::class,'Recentusers']);
Route::get('/User/{user}',[AuthController::class,'userById']);

Route::get('/DemandeNonAccepte',[DemandeDepotController::class,'notAccepted']);


Route::get('/Etablisement/{etablisement}/Encadreur',[EncadreursController::class,'byEtablisement']);

Route::get('/Emprunt/{emprunt}/Memoire',[EmpruntController::class,'byEmprunt']);
Route::get('/Domaine/{domaine}/Memoire',[MemoireController::class,'byDomaine']);
Route::get('/MemoireAccepted',[MemoireController::class,'MemoireAccepted']);

Route::get('/MemoireDeMemeDomaine/{demandedepot}',[MemoireController::class,'MemoireDeMemeDomaine']);

Route::get('/User/{user}/DemandeEmprunt',[DemandeEmpruntController::class,'byUser']);

Route::get('/User/{user}/DemandeDepot',[DemandeDepotController::class,'byUser']);


Route::get('/User/{user}/nbEmpruntparUserAccepte',[DemandeEmpruntController::class,'nbEmpruntparUserAccepte']);
Route::get('/User/{user}/nbEmpruntparUserRefuse',[DemandeEmpruntController::class,'nbEmpruntparUserRefuse']);
Route::post('/logout', [AuthController::class, 'logout']);

Route::get('/informatique', [MemoireController::class, 'MemoireInformatique']);
Route::get('/physique', [MemoireController::class, 'MemoirePhysique']);
Route::get('/chimie', [MemoireController::class, 'MemoireChimie']);
Route::get('/math', [MemoireController::class, 'MemoireMath']);
Route::get('/autre', [MemoireController::class, 'MemoireAutre']);

