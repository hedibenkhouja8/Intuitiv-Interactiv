<?php

namespace App\Http\Controllers;

use App\Models\Etablisement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EtablisementsController extends Controller
{
   /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Etablisement::all();

    }
    public function index2()
    {
       return  $shares = DB::table('etablisements')
      ->select('nom')->groupBy('nom')
        ->get();

    } public function index3()
    {
       return  $shares = DB::table('etablisements')
      ->select('ville')->groupBy('ville')
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
        return Etablisement::create($request->all());
    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Etablisement::find($id);
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
        $etablisement = Etablisement::find($id);
        $etablisement->update($request->all());
        return $etablisement;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return Etablisement::destroy($id);
    }
}
