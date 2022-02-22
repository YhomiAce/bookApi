<?php

namespace App\Http\Controllers;

use App\Mail\ContactMe;
use App\Mail\HelpMe;
use App\Mail\SupportMe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class PracticeController extends Controller
{
    public function sendMail(Request $request)
    {
        request()->validate(['email'=>"required|email"]);
        $email = $request->email;
        $message = $request->message;
        // Mail::raw($message, function($param){
        //     $param->to(request('email'))
        //         ->subject('Test Message');
        // });
        // Mail::to($email)->send(new ContactMe($message));
        // Mail::to($email)->send(new SupportMe());
        Mail::to($email)->send(new HelpMe());
        return redirect('/mail');
    }
}
