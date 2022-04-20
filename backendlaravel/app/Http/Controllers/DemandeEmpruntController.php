<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Memoire;
use Illuminate\Http\Request;
use App\Models\DemandeEmprunt;

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
         //Si on veut les details du memoires avec ses emprunts
      //   return DemandeEmprunt::with('memoire')
        // ->where('id',$user->id)->get();
     }
}
