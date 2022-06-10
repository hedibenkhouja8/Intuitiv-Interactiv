<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\User;
use App\Models\DemandeEmprunt;
use Illuminate\Http\Request;

class NotificationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Notification::all();
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return Notification::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return Notification::find($id);
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
        $critere = Notification::find($id);
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
        return Notification::destroy($id);
    }
    public function byUser(User $user){
        
        $notif= DB::table('notifications')
                ->where('user_id',$user->id)
                ->where('admin',0)
                ->orderBy('created_at','desc')
                ->take(4)->get();
                return $notif;
              
                        
    }
    public function byUserall(User $user){
        
        $notif= DB::table('notifications')
                ->where('user_id',$user->id)
                ->where('admin',0)
                ->where('viewed',1)
                ->orderBy('created_at','desc')
                ->get();
                return $notif;
              
                        
    }
    public function Adminnotif(){
        
        $notif= DB::table('notifications')
                ->where('admin',1)
                ->orderBy('created_at','desc')
                ->take(4)
                ->get();
                return $notif;
    }
    public function allAdminnotif(){
        
        $a= Notification::join('demande_depots', 'notifications.demande_depot_id', '=', 'demande_depots.id') 
        ->where('demande_depots.status','!=','EnAttente')
        ->orderBy('notifications.created_at','desc')
        ->get('notifications.*');

        $b =Notification::join('demande_emprunts', 'notifications.demande_emprunt_id', '=', 'demande_emprunts.id')
        ->where('demande_emprunts.status','!=','EnAttente')
        ->orderBy('notifications.created_at','desc')
        ->get();
        $d =Notification::join('users', 'notifications.user_id', '=', 'users.id')
        ->where('titre','=','compte')
        ->where('users.etatdecompte','!=','notactive')
        ->orderBy('notifications.created_at','desc')
        ->get();

        $c=$a->merge($b)->merge($d)->SortBy('notifications.created_at');
        return $c;
    }
    public function allAdminnotifmobile(){
        
        return DemandeEmprunt::with('memoire.demande_depot')->where('status', '=', 'EnAttente')
        ->orderBy('status')->orderBy('created_at', 'desc')->get();

    }
    public function viewed($id){

        DB::table('notifications')
        ->where('id',$id)
        ->update(['viewed' => 1
        ]);
       
       
    }
    public function notviewed(User $user){

        $notif= DB::table('notifications')
        ->where('user_id',$user->id)
        ->where('admin',0)
        ->where('viewed',0)
        ->count();
        return $notif;
       
       
    }
    public function notviewedlist(User $user){

        $notif= DB::table('notifications')
        ->where('user_id',$user->id)
        ->where('admin',0)
        ->where('viewed',0)
        ->get();
        return $notif;
       
       
    }
    public function notviewedadmin(){

        $notif= DB::table('notifications')
        ->where('admin',1)
        ->where('viewed',0)
        ->count();
        $a= Notification::join('demande_depots', 'notifications.demande_depot_id', '=', 'demande_depots.id') 
        ->where('demande_depots.status','=','EnAttente')
        ->orderBy('notifications.created_at','desc')
        ->get()->count();

        $b =Notification::join('demande_emprunts', 'notifications.demande_emprunt_id', '=', 'demande_emprunts.id')
        ->where('demande_emprunts.status','=','EnAttente')
        ->orderBy('notifications.created_at','desc')
        ->get()->count();

        $d =Notification::join('users', 'notifications.user_id', '=', 'users.id')
        ->where('titre','=','compte')
        ->where('users.etatdecompte','=','notactive')
        ->orderBy('notifications.created_at','desc')
        ->get()->count();

        $c=$a+$b+$d;
        return $c;
       
       
    }
    public function notviewedadminlist(){

        

        $a= Notification::join('demande_depots', 'notifications.demande_depot_id', '=', 'demande_depots.id') 
        ->where('demande_depots.status','=','EnAttente')
        ->orderBy('notifications.created_at','desc')
        ->get('notifications.*');

        $b =Notification::join('demande_emprunts', 'notifications.demande_emprunt_id', '=', 'demande_emprunts.id')
        ->where('demande_emprunts.status','=','EnAttente')
        ->orderBy('notifications.created_at','desc')
        ->get();
        $d =Notification::join('users', 'notifications.user_id', '=', 'users.id')
        ->where('titre','=','compte')
        ->where('users.etatdecompte','=','notactive')
        ->orderBy('notifications.created_at','desc')
        ->get();

        $c=$a->merge($b)->merge($d)->SortBy('notifications.created_at');
        return $c;


               
       
    }

}
