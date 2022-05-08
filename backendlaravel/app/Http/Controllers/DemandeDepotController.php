<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\DemandeDepot;
use App\Models\Etablisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Memoire;
use App\Models\Notification;

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
        $fields = $request->validate([
            'titre' => 'required|string',
            'critere_id'=> 'required',
            'domaine_id'=> 'required',
            'encadreur_id'=> 'required',
            'user_id'=> 'required',
            'description' => 'required|string|min:20',
            'nbpages'=> 'required',
            'etablisement_id' => 'required',
            'fichierpdf' => 'required',
            'fichierdemande' => 'required',
            'entreprise_id' => 'required'


        ]);

        $file = $request->file('fichierpdf');
        $file1 = $request->file('fichierdemande');
        $file2 = $request->file('coverimage');
        $file->store('public/files/demandes/pdf');
        //$request->fichierpdf->store('public/files/demandes/pdf');
        $file1->store('public/files/demandes/demande');
        $file2->store('public/files/demandes/cover');

        if($request->hasFile('fichierbrevet') ) {
            $file3 = $request->file('fichierbrevet');
            $file3->store('public/files/demandes/fichierbrevet');
            $file3 = $request->file('fichierbrevet')->hashName();
           }  
           else{
               $file3 =NULL;
           }
           if($request->hasFile('fichierrecherche') ) {
            $file4 = $request->file('fichierrecherche');
            $file4->store('public/files/demandes/fichierrecherche');
            $file4 = $request->file('fichierrecherche')->hashName();
           }  
           else{
               $file4 =NULL;
           }
           
           $demande = new DemandeDepot;
           $demande->titre = $fields['titre'];
           $demande->user_id = $fields['user_id'];
           $demande->encadreur_id = $fields['encadreur_id'];
           $demande->domaine_id = $fields['domaine_id'];
           $demande->critere_id = $fields['critere_id'];
           $demande->description = $fields['description'];
           $demande->status = "EnAttente";
           $demande->fichierpdf = $fields['fichierpdf']->hashName();
           $demande->fichierdemande = $fields['fichierdemande']->hashName();
           $demande->etablisement_id = $fields['etablisement_id'];
           $demande->nbpages = $fields['nbpages'];
           $demande->entreprise_id = $fields['entreprise_id'];
           $demande->coverimage = $request->coverimage->hashName();
           $demande->fichierbrevet = $file3;
           $demande->fichierrecherche = $file4;
           $demande->save();

           $notif= new Notification;
           $notif->titre  ='Demande depot';
           $notif->content ='une nouvelle demande de depot';
           $notif->user_id =$demande->user_id;
           $notif->admin= 1; 
           $notif->save();

       

    
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

        $notif= new Notification;
        $notif->titre  ='Demande depot';
        $notif->content ="votre demande de depot de la memoire ' $demandedepot->titre ' a été accepté";
        $notif->user_id =$demandedepot->user_id;
        $notif->save();
  
     

    }
    
    public function DemandeDepotrefuse(DemandeDepot $demandedepot)
    {
        DB::table('demande_depots')
        ->where('id',$demandedepot->id)
        ->update(['status' => 'Refuse'
        ]);
        $notif= new Notification;
        $notif->titre  ='Demande depot';
        $notif->content ="votre demande de depot de la memoire ' $demandedepot->titre 'a été refusée";
        $notif->user_id =$demandedepot->user_id; 
        $notif->save();
     

    }
}
