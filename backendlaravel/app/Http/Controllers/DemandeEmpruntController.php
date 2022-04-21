<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Memoire;
use Illuminate\Http\Request;
use App\Models\DemandeEmprunt;
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
        return DemandeEmprunt::all();

    }
    public function recentDemandeEmprunts()
    {
       // return orderBy('created_at')->get();;
        
        return DemandeEmprunt::with('user')->with('memoire.demande_depot')->orderBy('created_at','desc')->take(4)->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DemandeEmprunt::create($request->all());
    
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
    public function byMemoire(Memoire $memoire){
       return $memoire->demandeemprunts;
        //Si on veut les details du memoires avec ses emprunts
        /* return Memoire::with('demendeemprunts')
        ->where('id',$memoire->id)->get();*/
    }
    public function byUser(User $user){
       // return $user->demande_emprunts;
        return DemandeEmprunt::with('memoire.demande_depot')
        ->where('user_id',$user->id)->get();



        $demandeemprunt = DemandEmprunt::whereHas('memoire', function($q){
            $q->where('created_at', '>=', '2015-01-01 00:00:00');
        })->get();

        
         //Si on veut les details du memoires avec ses emprunts
      //   return DemandeEmprunt::with('memoire')
        // ->where('id',$user->id)->get();
     }
     public function X(User $user){
       return  $shares = DB::table('demande_emprunts')
        ->join('memoires', 'demande_emprunts.memoire_id', '=', 'memoires.id')
        ->join('users', 'users.id', '=', 'demande_emprunts.user_id')
        ->where('users.id',$user->id)
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
}
