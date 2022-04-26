<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Memoire;

class DemandeDepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DemandeDepot::with('user')->with('domaine')->with('critere')->with('encadreur')->with('etablisement')->where('status','!=','Accepte')
        ->orderBy('status')  ->orderBy('created_at','desc')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $file = $request->file('fichierpdf');
        $file1 = $request->file('fichierdemande');
        $file2 = $request->file('coverimage');
        $file3 = $request->file('fichierbrevet');
        $file4 = $request->file('fichierrecherche');

        $file->store('public/files/demandes/pdf');
        //$request->fichierpdf->store('public/files/demandes/pdf');
        $file1->store('public/files/demandes/demande');
        $file2->store('public/files/demandes/cover');
        $file3->store('public/files/demandes/fichierbrevet');
        $file4->store('public/files/demandes/fichierrecherche');

        $demande = new DemandeDepot;
        $demande->titre = $request->titre;
        $demande->user_id = $request->user_id;
        
        $demande->encadreur_id = $request->encadreur_id;
        $demande->domaine_id = $request->domaine_id;
        $demande->critere_id = $request->critere_id;
        
        $demande->description = $request->description;
        $demande->status = "EnAttente";
        $demande->fichierpdf = $request->fichierpdf->hashName();
        $demande->fichierdemande = $request->fichierdemande->hashName();
        $demande->etablisement_id = $request->etablisement_id;
        $demande->nbpages = $request->nbpages;
        $demande->entreprise_id = $request->entreprise_id;
        $demande->coverimage = $request->coverimage->hashName();
        $demande->fichierbrevet = $request->fichierbrevet->hashName();
        $demande->fichierrecherche = $request->fichierrecherche->hashName();
        $demande->save();

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DemandeDepot::find($id);
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
        $request->fichierpdf->store('public/files/demandes/pdf');
        $request->fichierdemande->store('public/files/demandes/demande');

        DB::table('demande_depots')
        ->where('id',$id)
        ->update([
        'titre' => $request->titre,
        'user_id' => $request->user_id,
        'encadreur_id' => $request->encadreur_id,
        'critere_id' => $request->critere_id,
        'domaine_id' => $request->domaine_id,
        'description' => $request->description,
        'status' => $request->status,
        'memoire_id' => $request->memoire_id,
        'fichierpdf' => $request->fichierpdf->hashName(),
        'fichierdemande' => $request->fichierdemande->hashName(),
        'etablisement_id' => $request->etablisement_id,
        'nbpages' => $request->nbpages
            ]);
            

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return DemandeDepot::destroy($id);
    }
    public function byEtablisement(Etablisement $etablisement){
        return $etablisement->demandedepots;
        //Si on veut les details du memoires avec ses Emprunts
        /* return Memoire::with('Emprunts')
        ->where('id',$memoire->id)->get();*/
    }
    public function byUser(User $user){
      //  return $user->demandedepots;
        //Si on veut les details du memoires avec ses Emprunts
        return DemandeDepot::with('memoire')->where('status','!=','Accepte')
        ->where('user_id',$user->id)->get();
    }
    public function acceptebyUser(User $user){
        //  return $user->demandedepots;
          //Si on veut les details du memoires avec ses Emprunts
          return DemandeDepot::with('memoire')->where('status','=','Accepte')
          ->where('user_id',$user->id)->get();
      }
    public function recentDemandeDepots()
    {
       // return orderBy('created_at')->get();;
        
        return DemandeDepot::with('user')->where('status','=','EnAttente')->where('status','=','EnAttente')->orderBy('created_at','desc')->take(4)->get();

    }
    public function DemandeDepotDetails(DemandeDepot $demandedepot){
        // return $domaine->demande_depots;
          //Si on veut les details du memoires avec ses Emprunts
          return DemandeDepot::with('entreprise')->with('critere')->with('domaine')->with('etablisement')->with('user')->with('encadreur')
          ->where('id',$demandedepot->id)->get();
      }  public function DemandeDepotByUser($user){
        // return $domaine->demande_depots;
          //Si on veut les details du memoires avec ses Emprunts
          return DemandeDepot::with('entreprise')->with('critere')->with('domaine')->with('etablisement')->with('user')->with('encadreur')
          ->where('user_id','=',$user)->where('status','=','EnAttente')->get();
      } public function DemandeDepotByUserA($user){
        // return $domaine->demande_depots;
          //Si on veut les details du memoires avec ses Emprunts
          return DemandeDepot::with('entreprise')->with('critere')->with('domaine')->with('etablisement')->with('user')->with('encadreur')
          ->where('user_id','=',$user)->where('status','=','Accepte')->get();
      } public function DemandeDepotByUserR($user){
        // return $domaine->demande_depots;
          //Si on veut les details du memoires avec ses Emprunts
          return DemandeDepot::with('entreprise')->with('critere')->with('domaine')->with('etablisement')->with('user')->with('encadreur')
          ->where('user_id','=',$user)->where('status','=','Refuse')->get();
      }
    public function notAccepted(){
        return DemandeDepot::with('memoire')->where('status','=','EnAttente')->get();

    }

    public function DemandeDepotaccept(DemandeDepot $demandedepot)
    {
        DB::table('demande_depots')
        ->where('id',$demandedepot->id)
        ->update(['status' => 'Accepte'
        ]);
        $memoire= new Memoire;
        $memoire->archive  ='no';
        $memoire->demande_depot_id = $demandedepot->id;
        $memoire->save();
  
     

    }
    
    public function DemandeDepotrefuse(DemandeDepot $demandedepot)
    {
        DB::table('demande_depots')
        ->where('id',$demandedepot->id)
        ->update(['status' => 'Refuse'
        ]);

     

    }
}
