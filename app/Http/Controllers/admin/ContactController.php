<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

class ContactController extends Controller
{
    public function message(Request $request)
{
$data = $request->all();

$validator = Validator::make($data, [
    'email' => 'required|email',
    'subject' => 'required|string',
    'message' => 'required|string',
],[
    'email.required' => 'email is required',
    'email.email' => 'email is not valid',
    'subject.required' => 'subject is required',
    'subject.string' => 'subject is not valid',
    'message.required' => 'message is required',
    'message.string' => 'message is not valid',
]);

if($validator->fails()){ // se fallisce la vaLIDazione rispondendo con un booleano
    return response()->json( ['errors' => $validator->errors()], 400);  //mandare bad request, con il json rispondiamo con gli errori, come array associativo.
}

 $mail = new ContactMail(  //si istanzia la mail passandogli poi i data provenienti dalle request
    sender: $data['email'],
    subject: $data['subject'],
    content: $data['message'],
 );
 Mail::to(env('MAIL_TO_ADDRESS'))->send($mail);


  return response(null, 204);
}
}
