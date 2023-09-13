<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function message(Request $request)
{
 $mail = new ContactMail();
 Mail::to(env('MAIL_TO_ADDRESS'))->send($mail);
 return response(null, 204);
}
}
