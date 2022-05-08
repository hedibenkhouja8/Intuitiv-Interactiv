<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Notification;
use App\Models\User;

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
                ->get();
                return $notif;
              
                        
    }
    public function Adminnotif(){
        
        $notif= DB::table('notifications')
                ->where('admin',1)
                ->get();
                return $notif;
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

}
