<?php

namespace App\Http\Controllers;
use Validator;

use App\Models\Domaine;
use App\Models\Memoire;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MemoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
        return Memoire::with('demande_depot.user')->with('demande_depot.critere')->with('demande_depot.domaine')->with('demande_depot.etablisement')->where('archive','=','no')->get();

    } public function archive()
    {
     
        return Memoire::with('demande_depot.user')->with('demande_depot.critere')->with('demande_depot.domaine')->where('archive','=','yes')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $memoire = new Memoire;
        $memoire->date_acceptation = $request->date_acceptation;
        $memoire->demande_depot_id = $request->demande_depot_id;
    
        $memoire->save(); 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Memoire::find($id);
        //return Memoire::find($id)->with('demande_depot')->get();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $memoire = Memoire::find($id);
        $memoire->update($request->all());
        return $memoire;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return Memoire::destroy($id);
    }
     /**
     * The Emprunts of a Memoire
     * @return \Illuminate\Http\Response
     * @param  Etablisement  $etablisement
     * Route: /api/Etablisement/{etablisement}/Memoire
     */
    public function byEtablisement(Etablisement $etablisement){
        return $etablisement->memoires;
        //Si on veut les details du memoires avec ses Emprunts
        /* return Memoire::with('Emprunts')
        ->where('id',$memoire->id)->get();*/
    }
      /**
     * The Emprunts of a Memoire
     * @return \Illuminate\Http\Response
     * @param  Domaine  $domaine
     * Route: /api/Domaine/{domaine}/Memoire
     */
    public function byDomaine(DemandeDepot $demandedepot){
       // return $domaine->demande_depots;
         //Si on veut les details du memoires avec ses Emprunts
         return DemandeDepot::with('demendeEmprunts')
         ->where('id',$memoire->id)->get();
     }
     public function byDemande(Memoire $memoire){
      //  return $memoire->demandedepot;
         //Si on veut les details du memoires avec ses Emprunts
         return Memoire::with('demande_depot.critere')->with('demande_depot.domaine')->with('demande_depot.user')->with('demande_depot.etablisement')
         ->with('demande_depot.encadreur')->with('demande_depot.entreprise')
         ->where('id',$memoire->id)->get();
     }
     public function MemoireAccepted(){
        //  return $memoire->demandedepot;
           //Si on veut les details du memoires avec ses Emprunts
        return DemandeDepot::with('memoire')->with('user')->where('status','=','Accepte')->get();
       }
       public function MemoireDeMemeDomaine( $domaine){
        // return $memoire->demandedepot;
        //return DemandeDep
           //Si on veut les details du memoires avec ses Emprunts
        return DemandeDepot::with('memoire')->with('user')->with('domaine')->with('critere')->with('etablisement')->with('encadreur')->where('domaine_id',$domaine)->where('status','=','Accepte')->get();
       }
       public function MemoireEncadreur( $encadreur){
        // return $memoire->demandedepot;
        //return DemandeDep
           //Si on veut les details du memoires avec ses Emprunts
        return DemandeDepot::with('memoire')->with('user')->with('domaine')->with('critere')->with('etablisement')->with('encadreur')->where('encadreur_id',$encadreur)->where('status','=','Accepte')->get();
       }
    public function MemoireInformatique()
    {
     
       // return DemandeDepot::with('memoire')->where('domaine_id','=','1');

     return DemandeDepot::with('memoire')->where('domaine_id','=',1)->where('status','=','Accepte')->get();
    }
    public function MemoirePhysique()
    {
     
       // return DemandeDepot::with('memoire')->where('domaine_id','=','1');

     return DemandeDepot::with('memoire')->where('domaine_id','=',4)->where('status','=','Accepte')->get();
    }  public function MemoireChimie()
    {
     
       // return DemandeDepot::with('memoire')->where('domaine_id','=','1');

     return DemandeDepot::with('memoire')->where('domaine_id','=',5)->where('status','=','Accepte')->get();
    }  public function MemoireMath()
    {
     
       // return DemandeDepot::with('memoire')->where('domaine_id','=','1');

     return DemandeDepot::with('memoire')->where('domaine_id','=',6)->where('status','=','Accepte')->get();
    }  public function MemoireAutre()
    {
     
       // return DemandeDepot::with('memoire')->where('domaine_id','=','1');

     return DemandeDepot::with('memoire')->where('domaine_id','!=',1)->where('status','=','Accepte')->where('domaine_id','!=',6)->where('domaine_id','!=',4)->where('domaine_id','!=',5)->get();
    }
    public function archivememoire(Memoire $memoire)
    {
        DB::table('memoires')
        ->where('id',$memoire->id)
        ->update(['archive' => 'yes'
        ]);

     

    }   public function desarchivememoire(Memoire $memoire)
    {
        DB::table('memoires')
        ->where('id',$memoire->id)
        ->update(['archive' => 'no'
        ]);

     

    }
}
