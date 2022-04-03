<?php

namespace App\Http\Controllers;
use App\Models\Critere;
use Illuminate\Http\Request;

class CritereController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Critere::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Critere::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Critere::find($id);
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
        $critere = Critere::find($id);
        $critere->update($request->all());
        return $critere;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Critere::destroy($id);

    }
      /**
     * The Empreints of a Memoire
     * @return \Illuminate\Http\Response
     * @param  Memoire  $memoire
     * Route: /api/Memoire/{memoire}/Critere
     */
    public function byMemoire(Memoire $memoire){
        return $memoire->criteres;
         //Si on veut les details du memoires avec ses empreints
         /* return Memoire::with('demendeempreints')
         ->where('id',$memoire->id)->get();*/
     }
    
}
