<?php

namespace App\Http\Controllers;

use App\Models\Memoire;
use App\Models\Emprunt;
use Illuminate\Http\Request;

class EmpruntController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Emprunt::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Emprunt::create($request->all());
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Emprunt::find($id);
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
        $Emprunt = Emprunt::find($id);
        $Emprunt->update($request->all());
        return $Emprunt;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return Emprunt::destroy($id);
    }
    /**
     * The Emprunts of a Memoire
     * @return \Illuminate\Http\Response
     * @param  Memoire  $memoire
     * Route: /api/Memoire/{memoire}/Emprunt
     */
    public function byMemoire(Memoire $memoire){
        return $memoire->emprunts;
        //Si on veut les details du memoires avec ses empreints
        /* return Memoire::with('empreints')
        ->where('id',$memoire->id)->get();*/
    }

}
