<?php

namespace App\Http\Controllers;
use App\Models\DemandeDepot;
use Illuminate\Http\Request;

class DemandeDepotController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DemandeDepot::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->fichierpdf->store('public/files/demandes/pdf');
        $request->fichierdemande->store('public/files/demandes/demande');
        $demande = new DemandeDepot;
        $demande->titre = $request->titre;
        $demande->user_id = $request->user_id;
        $demande->description = $request->description;
        $demande->status = $request->status;
        $demande->memoire_id = $request->memoire_id;
        $demande->fichierpdf = $request->fichierpdf->hashName();
        $demande->fichierdemande = $request->fichierdemande->hashName();
        $demande->etablisement_id = $request->etablisement_id;
        $demande->nbpages = $request->nbpages;
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
        $demandeDepot = DemandeDepot::find($id);
        $demandeDepot->update($request->all());
        return $demandeDepot;

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
}
