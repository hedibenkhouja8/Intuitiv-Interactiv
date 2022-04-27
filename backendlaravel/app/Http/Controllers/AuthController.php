<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etablisement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'prenom'=> 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'fichierdemande' => 'required',
            'etablisement_id' => 'required'
        ]);
        $fields['fichierdemande']->store('public/files/register/demande');

        $file = $request->file('profilepic');
        $file->store('public/files/register/profilepic');

        $user = User::create([
            'name' => $fields['name'],
            'prenom'=> $fields['prenom'],
            'email' => $fields['email'],
            'fichierdemande' => $fields['fichierdemande']->hashName(),
            'etablisement_id' =>$fields['etablisement_id'],
            'tel'=>$request->tel,
            'profilepic'=>$request->profilepic->hashName(),
            'password' => bcrypt($fields['password'])
        ]);

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function login(Request $request) {
        $fields = $request->validate([
            'email' => 'required|string',
            'password' => 'required|string'
        ]);

        // Check email
        $user = User::where('email', $fields['email'])->first();

        // Check password
        if(!$user || !Hash::check($fields['password'], $user->password)) {
            return response([
                'message' => 'pass incorect '
            ], 401);
        }
        if($user->etatdecompte != 'active' and $user->etatdecompte != 'restreint'  ) {
            return response([
                'message' => 'account not  active '
            ], 401);
        }

        $token = $user->createToken('myapptoken')->plainTextToken;

        $response = [
            'user' => $user,
            'token' => $token
        ];

        return response($response, 201);
    }

    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logged out'
        ];
    }
    public function byEtablisement(Etablisement $etablisement){
        return $etablisement->users;
        //Si on veut les details du memoires avec ses Emprunts
        /* return Memoire::with('Emprunts')
        ->where('id',$memoire->id)->get();*/
    }
    
    public function frequentEtab()
    {
        $users = DB::table('users') 
        ->select(DB::raw('count(*) as etab, etablisement_id'))->groupBy('etablisement_id')->orderBy('etab','desc')->limit(5)
        ->get();
        /*
        
        $users = DB::table('users')->join('etablisements', 'users.etablisement_id', '=', 'etablisements.id')
        ->select('users.name','etablisements.nom')
        ->select(DB::raw('count(*) as etab, etablisement_id'))->get();*/
        return $users;

    }
    public function users()
    {
      
        return User::with('etablisement')->where('etatdecompte','=','active')->get();

    } public function users2()
    {
      
        return User::with('etablisement')->where('etatdecompte','=','restreint')->get();

    }
    public function userById(User $user){
        //  return $memoire->demandedepot;
           //Si on veut les details du memoires avec ses Emprunts
           return User::with('etablisement')->with('demande_emprunts')
           ->where('id',$user->id)->get();
       }
       public function usersenattente(){
        //  return $memoire->demandedepot;
           //Si on veut les details du memoires avec ses Emprunts
           return User::with('etablisement')
           ->where('etatdecompte','=','notactive')->orderBy('created_at', 'desc')->get();
       }
       public function Recentusers()
       {
         
           return User::with('etablisement')->orderBy('created_at', 'desc')->limit(5)->get();
   
       }
       public function Acceptuser(User $user)
    {
        DB::table('users')
        ->where('id',$user->id)
        ->update(['etatdecompte' => 'active'
        ]);

     

    }
    public function Refuseuser(User $user)
    {
        DB::table('users')
        ->where('id',$user->id)
        ->update(['etatdecompte' => 'refused'
        ]);

     

    }
    public function Restreintuser(User $user)
    {
        DB::table('users')
        ->where('id',$user->id)
        ->update(['etatdecompte' => 'restreint'
        ]);

     

    }
    public function Derestreintuser(User $user)
    {
        DB::table('users')
        ->where('id',$user->id)
        ->update(['etatdecompte' => 'active'
        ]);

     

    }
    public function updateuser(Request $request,$id) {
        $user = User::find($id);

        $fields = $request->validate([
            'name' => 'string',
            'prenom'=> 'string',
            'email' =>[ 'email',Rule::unique('users')->ignore($user->id)],
            'password' => 'string|confirmed',
        ]);


        
            $user->name =$fields['name'];
            $user->prenom = $fields['prenom'];
            $user->email = $fields['email'];
            $user->fichierdemande = $user->fichierdemande;
            $user->etablisement_id = $user->etablisement_id;
            $user->tel = $request->tel;
            $user->profilepic = $user->profilepic;
            $user->password = bcrypt($fields['password']);
            $user->save();
            

     

        return response(201);
    }
}