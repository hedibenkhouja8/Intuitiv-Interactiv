<?php

namespace App\Http\Controllers;

use App\Models\Memoire;
use Illuminate\Http\Request;
use App\Models\DemandeEmpreint;

class DemandeEmpreintController extends Controller
{
 /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return DemandeEmpreint::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return DemandeEmpreint::create($request->all());
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return DemandeEmpreint::find($id);
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
        $demandeEmpreint = DemandeEmpreint::find($id);
        $demandeEmpreint->update($request->all());
        return $demandeEmpreint;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return DemandeEmpreint::destroy($id);
    }
      /**
     * The Empreints of a Memoire
     * @return \Illuminate\Http\Response
     * @param  Memoire  $memoire
     * Route: /api/Memoire/{memoire}/DemandeEmpreint
     */
    public function byMemoire(Memoire $memoire){
       return $memoire->demendeempreints;
        //Si on veut les details du memoires avec ses empreints
        /* return Memoire::with('demendeempreints')
        ->where('id',$memoire->id)->get();*/
    }
}
