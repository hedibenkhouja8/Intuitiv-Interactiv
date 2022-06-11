<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function sendmailcontact(Request $request) {
        $fields = $request->validate([
            'name' => 'required|string',
            'phone'=> 'required',
            'email' => 'required|email',
            'message' => 'required|string'
            
        ]);
        $data=[
            'name' => $fields['name'],
            'phone'=> $fields['phone'],
            'email'=> $fields['email'],
            'message'=> $fields['message'],
        ];
         Mail::to('pfeoussamahedi@gmail.com')->send(new ContactMail($data));      
         
    }
}
