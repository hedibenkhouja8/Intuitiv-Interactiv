<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Memoire;
use Illuminate\Http\Request;
use App\Models\DemandeEmprunt;
use App\Models\Notification;
use Illuminate\Support\Facades\DB;

class DemandeEmpruntController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DemandeEmprunt::with('user')->with('memoire.demande_depot')->where('status', '!=', 'Accepte')
            ->orderBy('status')->orderBy('created_at', 'desc')->get();
    }
    public function acceptedbyUser($user)
    {
        $currentDate = date('Y-m-d');
        return DemandeEmprunt::with('user')->with('memoire.demande_depot.user')->with('memoire.demande_depot.domaine')->with('memoire.demande_depot.critere')->where('status', '=', 'Accepte')->where('user_id', '=', $user)->where('date_fin', '>=', $currentDate)
            ->orderBy('status')->orderBy('created_at', 'desc')->get();
    }
    public function acceptedanddonebyUser($user)
    {
        $currentDate = date('Y-m-d');
        return DemandeEmprunt::with('user')->with('memoire.demande_depot.user')->with('memoire.demande_depot.domaine')->with('memoire.demande_depot.critere')->where('status', '=', 'Accepte')->where('user_id', '=', $user)->where('date_fin', '>=', $currentDate)
            ->orderBy('status')->orderBy('created_at', 'desc')->get();
    }
    public function refusedanddonebyUser($user)
    {
        $currentDate = date('Y-m-d');
        return DemandeEmprunt::with('user')->with('memoire.demande_depot.user')->with('memoire.demande_depot.domaine')->with('memoire.demande_depot.critere')->where('status', '=', 'Refuse')->where('user_id', '=', $user)
            ->orderBy('status')->orderBy('created_at', 'desc')->get();
    }
    public function enattentebyUser($user)
    {
        $currentDate = date('Y-m-d');
        return DemandeEmprunt::with('user')->with('memoire.demande_depot.user')->with('memoire.demande_depot.domaine')->with('memoire.demande_depot.critere')->where('status', '=', 'EnAttente')->where('user_id', '=', $user)
            ->orderBy('status')->orderBy('created_at', 'desc')->get();
    }
    public function DemandeEmpruntDetails(DemandeEmprunt $demandeemprunt)
    {
        // return $domaine->demande_depots;
        //Si on veut les details du memoires avec ses Emprunts
        return DemandeEmprunt::with('user')->with('memoire.demande_depot')
            ->where('id', $demandeemprunt->id)->get();
    }
    public function recentDemandeEmprunts()
    {
        // return orderBy('created_at')->get();;

        return DemandeEmprunt::with('user')->where('status', '=', 'EnAttente')->with('memoire.demande_depot')->where('status', '=', 'EnAttente')->orderBy('created_at', 'desc')->take(4)->get();
    }
    public function DemandeEmpruntsAccepted()
    {
        // return orderBy('created_at')->get();;

        return DemandeEmprunt::with('user')->where('status', '=', 'Accepte')->with('memoire.demande_depot.user')->orderBy('created_at', 'desc')->get();
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
            'user_id' => 'required',
            'description' => 'required|string|min:20',
            'memoire_id' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required',
            'type' => 'required',

        ]);

        $demande = new DemandeEmprunt;
        $demande->user_id = $fields['user_id'];
        $demande->memoire_id = $fields['memoire_id'];
        $demande->date_fin = $fields['date_fin'];
        $demande->date_debut = $fields['date_debut'];
        $demande->description = $fields['description'];
        $demande->type = $fields['type'];
        $demande->status = "EnAttente";


        $demande->save();
        $user = DB::table('users')
        ->where('id',$demande->user_id)
        ->first();
        $memoire=Memoire::where('id','=',$demande->memoire_id)->first();

            $titre = DB::table('demande_depots')
                ->where('id',$memoire->demande_depot_id)
                ->first();
        $notif = new Notification;
        $notif->titre  = 'Demande emprunt';
        $notif->content = "une nouvelle demande emprunt pour ' $titre->titre ' par ' $user->name ' ";
        $notif->user_id = $demande->user_id;
        $notif->admin = 1;
        $notif->demande_id =$demande->id;
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
        return DemandeEmprunt::find($id);
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
        $demandeEmprunt = DemandeEmprunt::find($id);
        $demandeEmprunt->update($request->all());
        return $demandeEmprunt;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return DemandeEmprunt::destroy($id);
    }
    /**
     * The Emprunts of a Memoire
     * @return \Illuminate\Http\Response
     * @param  Memoire  $memoire
     * Route: /api/Memoire/{memoire}/DemandeEmprunt
     */
    public function byMemoire(Memoire $memoire)
    {
        return $memoire->demande_emprunts;
        //Si on veut les details du memoires avec ses emprunts
        /* return Memoire::with('demande_emprunts')
        ->where('id',$memoire->id)->get();*/
    }
    public function byUser(User $user)
    {
        // return $user->demande_emprunts;
        return DemandeEmprunt::with('memoire.demande_depot')
            ->where('user_id', $user->id)->get();


        /*
         $demandeemprunt = DemandEmprunt::whereHas('memoire', function($q){
             $q->where('created_at', '>=', '2015-01-01 00:00:00');
         })->get();
 
         */
        //Si on veut les details du memoires avec ses emprunts
        //   return DemandeEmprunt::with('memoire')
        // ->where('id',$user->id)->get();
    }
    public function nbEmpruntparUserAccepte(User $user)
    {
        // return $user->demande_emprunts;
        //   return DemandeEmprunt::all()->where('user_id',$user->id)->get();

        $users = DB::table('demande_emprunts')->where('user_id', $user->id)->where('status', '=', 'Accepte')->get();
        return $users;
    }
    public function nbEmpruntparUserRefuse(User $user)
    {
        // return $user->demande_emprunts;
        //   return DemandeEmprunt::all()->where('user_id',$user->id)->get();

        $users = DB::table('demande_emprunts')->where('user_id', $user->id)->where('status', '=', 'Refuse')->get();
        return $users;
    }
    public function X()
    {
        return  $shares = DB::table('demande_emprunts')
            ->join('memoires', 'demande_emprunts.memoire_id', '=', 'memoires.id')

            ->join('demande_depots', 'demande_depots.id', '=', 'memoires.demande_depot_id')

            ->join('domaines', 'domaines.id', '=', 'demande_depots.domaine_id')
            ->get();
        /*   $latestPosts  = DB::table('users')
        ->join('demande_emprunts', function ($join) {
            $join->on('users.id', '=', 'demande_emprunts.user_id');
                 
        })->where('user_id',$user->id)
        ->get();
        $memoiresnuser = DB::table('memoires')
        ->joinSub($latestPosts , 'demande_emprunts', function ($join) {
            $join->on('memoires.id', '=', 'demande_emprunts.memoire_id');
        })->get();
        return $memoiresnuser;*/
    }
    public function DemandeEmpruntaccept(DemandeEmprunt $demandeemprunt)
    {
        DB::table('demande_emprunts')
            ->where('id', $demandeemprunt->id)
            ->update([
                'status' => 'Accepte'
            ]);
        
            $memoire=Memoire::where('id','=',$demandeemprunt->memoire_id)->first();

        $titre = DB::table('demande_depots')
            ->where('id',$memoire->demande_depot_id)
            ->first();

        $notif = new Notification;
        $notif->titre  = 'Demande emprunt';
        $notif->content = "votre demande de depot de la memoire ' $titre->titre 'a été accepté";
        $notif->user_id = $demandeemprunt->user_id;
        $notif->save();
    }

    public function DemandeEmpruntrefuse(DemandeEmprunt $demandeemprunt)
    {
        DB::table('demande_emprunts')
            ->where('id', $demandeemprunt->id)
            ->update([
                'status' => 'Refuse'
            ]);
            $memoire=Memoire::where('id','=',$demandeemprunt->memoire_id)->first();

            $titre = DB::table('demande_depots')
                ->where('id',$memoire->demande_depot_id)
                ->first();


        $notif = new Notification;
        $notif->titre  = 'Demande emprunt';
        $notif->content = "votre demande de depot de la memoire ' $titre->titre ' a été refusé";
        $notif->user_id = $demandeemprunt->user_id;
        $notif->save();
    }
}
