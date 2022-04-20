<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Etablisement;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    public function register(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'email' => 'required|string|unique:users,email',
            'password' => 'required|string|confirmed',
            'fichierdemande' => 'required',
            'etablisement_id' => 'required'
        ]);
        $fields['fichierdemande']->store('public/files/register');

        $user = User::create([
            'name' => $fields['name'],
            'email' => $fields['email'],
            'fichierdemande' => $fields['fichierdemande']->hashName(),
            'etablisement_id' =>$fields['etablisement_id'],
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
    
    public function users()
    {
      
        return User::with('etablisement')->get();

    }
    public function userById(User $user){
        //  return $memoire->demandedepot;
           //Si on veut les details du memoires avec ses Emprunts
           return User::with('etablisement')->with('demande_emprunts')
           ->where('id',$user->id)->get();
       }
       public function Recentusers()
       {
         
           return User::with('etablisement')->orderBy('created_at', 'desc')->get();
   
       }
}