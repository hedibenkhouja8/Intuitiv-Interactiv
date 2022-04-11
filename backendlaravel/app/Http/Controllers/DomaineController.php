<?php

namespace App\Http\Controllers;
use App\Models\Domaine;
use Illuminate\Http\Request;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Domaine::all();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Domaine::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Domaine::find($id);
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
        $domaine = Domaine::find($id);
        $domaine->update($request->all());
        return $domaine;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return Domaine::destroy($id);

    }
      /**
     * The Empreints of a Memoire
     * @return \Illuminate\Http\Response
     * @param  Memoire  $memoire
     * Route: /api/Memoire/{memoire}/Domaine
     */
    public function byMemoire(Memoire $memoire){
        return $memoire->domaines;
         //Si on veut les details du memoires avec ses empreints
         /* return Memoire::with('demendeempreints')
         ->where('id',$memoire->id)->get();*/
     }
    
}
