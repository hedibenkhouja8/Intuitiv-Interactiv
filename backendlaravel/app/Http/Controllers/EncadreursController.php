<?php

namespace App\Http\Controllers;

use App\Models\Encadreur;
use App\Models\Etablisement;
use Illuminate\Http\Request;

class EncadreursController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Encadreur::with('etablisement')->get();

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->hasFile('profilepic') ) {
            $file = $request->file('profilepic');
            $file->store('public/files/encadreurs/profilepic');
            $file = $request->file('profilepic')->hashName();

           }  
           else{
               $file ='user.jpg';
           }
           $encadreur = new Encadreur;
           $encadreur->nom = $request->nom;
           $encadreur->prenom = $request->prenom;
           $encadreur->profilepic = $file;
           $encadreur->description = $request->description;
           $encadreur->etablisement_id = $request->etablisement_id;
           $encadreur->save();

           

    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Encadreur::with('etablisement')->where('id', $id)->get();
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
        $encadreur = Encadreur::find($id);
        $encadreur->update($request->all());
        return $encadreur;

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       return Encadreur::destroy($id);
    }

    public function byEtablisement(Etablisement $etablisement){
        return $etablisement->encadreurs;
        //Si on veut les details du memoires avec ses Emprunts
        /* return Memoire::with('Emprunts')
        ->where('id',$memoire->id)->get();*/
    }
}
