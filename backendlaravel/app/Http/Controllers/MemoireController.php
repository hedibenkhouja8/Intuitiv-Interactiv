<?php

namespace App\Http\Controllers;
use App\Models\Domaine;

use App\Models\Memoire;
use App\Models\Etablisement;
use Illuminate\Http\Request;
use Validator;
class MemoireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Memoire::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    $request->fichierpdf->store('public/files/memoires/pdf');
    $request->coverimage ->store('public/files/memoires/cover');
    $request->fichierbrevet->store('public/files/memoires/fichierbrevet');
    $request->fichierrecherche->store('public/files/memoires/fichierrecherche');

        $memoire = new Memoire;
        $memoire->titre = $request->titre;
        $memoire->user_id = $request->user_id;
        $memoire->annee = $request->annee;
        $memoire->description = $request->description;
        $memoire->etablisement_id = $request->etablisement_id;
        $memoire->fichierpdf = $request->fichierpdf->hashName();
        $memoire->coverimage = $request->coverimage->hashName();
        $memoire->fichierbrevet = $request->fichierbrevet->hashName();
        $memoire->fichierrecherche = $request->fichierrecherche->hashName();

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
    public function byDomaine(Domaine $domaine){
        return $domaine->memoires;
         //Si on veut les details du memoires avec ses Emprunts
         /* return Memoire::with('demendeEmprunts')
         ->where('id',$memoire->id)->get();*/
     }
}
