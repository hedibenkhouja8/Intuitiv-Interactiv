<?php

namespace App\Http\Controllers;
use App\Models\Domaine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DomaineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Domaine::with('criteres')->get();

    }
    public function index2()
    {
       return  $shares = DB::table('domaines')->orderBy('id','asc')
      ->select('nom')->groupBy('nom')
        ->get();

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
    public function byDomaine(Domaine $domaine){
        return $domaine->criteres;
         //Si on veut les details du memoires avec ses empreints
         /* return Memoire::with('demendeempreints')
         ->where('id',$memoire->id)->get();*/
     }
    
}
