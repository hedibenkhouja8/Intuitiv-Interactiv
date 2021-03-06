<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etablisement;
use App\Models\Notification;
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

        if($request->hasFile('profilepic') ) {
            $file = $request->file('profilepic');
            $file->store('public/files/register/profilepic');
            $file = $request->file('profilepic')->hashName();

           }  
           else{
               $file ='user.jpg';
           }

        $user = User::create([
            'name' => $fields['name'],
            'prenom'=> $fields['prenom'],
            'email' => $fields['email'],
            'fichierdemande' => $fields['fichierdemande']->hashName(),
            'etablisement_id' =>$fields['etablisement_id'],
            'tel'=>$request->tel,
            'profilepic'=>$file,
            'password' => bcrypt($fields['password'])
        ]);
        $notif= new Notification;
        $notif->titre  ='Compte';
        $notif->content ="un compte en attente d'acceptation";
        $notif->user_id =$user->id;
        $notif->admin= 1; 
        $notif->save();
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
                'message' => 'Mot De Passe ou Email Incorrect'
            ], 401);
        }
        if($user->etatdecompte != 'active' and $user->etatdecompte != 'restreint'  ) {
            return response([
                'message' => 'compte non activ?? '
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
      
        return User::with('etablisement')->where('etatdecompte','=','active')->where('role','=','etudiant')->get();

    }
    public function index3()
    {
       return  $shares = DB::table('users')
       ->select(DB::raw('count(*) as total'))->where('etatdecompte','=','active')
       ->groupBy('etablisement_id')
        ->get();

    }
    
    
    
    public function users2()
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

        $notif= new Notification;
        $notif->titre  ='Welcome';
        $notif->content ='votre compte est active';
        $notif->user_id =$user->id;
        $notif->save();
     

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
        $notif= new Notification;
        $notif->titre  ='bonjour';
        $notif->content ='votre compte est Restreint ';
        $notif->user_id =$user->id;
        $notif->save();
     

    }
    public function Derestreintuser(User $user)
    {
        DB::table('users')
        ->where('id',$user->id)
        ->update(['etatdecompte' => 'active'
        ]);
        $notif= new Notification;
        $notif->titre  ='bonjour';
        $notif->content ='un admin a renouveler lacces de votre compte ';
        $notif->user_id =$user->id;
        $notif->save();
     

    }
    public function updateuser(Request $request,User $user) {
       // $user = User::find($id);

        //$fields = $request->validate([
          //  'name' => 'string',
            //'prenom'=> 'string',
            //'email' =>[ 'email',Rule::unique('users')->ignore($user->id)],
            //'password' => 'string|confirmed',
        //]);


        
          //  $user->name =$fields['name'];
            //$user->prenom = $fields['prenom'];
            //$user->email = $fields['email'];
            //$user->tel = $request->tel;
            //$user->password = bcrypt($fields['password']);

            //$user->profilepic = $user->profilepic;
            //$user->fichierdemande = $user->fichierdemande;
            //$user->etablisement_id = $user->etablisement_id;
            //$user->save();
            
            if($request->hasFile('profilepic') ) {
             $file = $request->file('profilepic');
             $file->store('public/files/register/profilepic');
             $file = $request->file('profilepic')->hashName();

            }  
            else{
                $file =$user->profilepic;
            }
            

            DB::table('users')
            ->where('id',$user->id)
            ->update([
    
            'name'    => $request->name,
            'prenom'    => $request->prenom,
            'tel'    => $request->tel,
            'profilepic'=>$file,
            'email'      => $request->email,
            'password' => Hash::make($request->password),
    
            ]);
     

        return response(201);
    }
    public function parmois(){
        return   DB::table("users")
   
        ->select(DB::raw("(COUNT(*)) as total_users"))   
        //   ->select(DB::raw("(COUNT(*)) as total_emprunts"), DB::raw("(DATE_FORMAT(created_at, '%m')) as month"))
       
               ->orderBy('created_at')
       ->where('etatdecompte','=','active')
               ->groupBy(DB::raw("DATE_FORMAT(created_at, '%m')"))
       
               ->get();
       } public function parville(){
        return   DB::table("users")
   
        ->select(DB::raw("(COUNT(*)) as total_users"))   
        ->join('etablisements', 'users.etablisement_id', '=', 'etablisements.id')
               
       ->where('etatdecompte','=','active')
               ->groupBy('ville')
       
               ->get();
       }
}