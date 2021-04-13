<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmEmail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function sendmail(){
        return view ('mails.confirm');
    }

    public function sending(Request $request){
        
        request()->validate([
            'mail' => 'required|email',
            'body' => 'required'
        ]);
        
        $to = $request->input('mail');
        $body = $request->input('body');

        //sending process

        $obj = new \stdClass();
        $obj->message = $body;

        Mail::to($to)->send(new ConfirmEmail($obj));

    }
}
