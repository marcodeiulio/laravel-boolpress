<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\ContactMail;

class ContactMailController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();

        $mail = new ContactMail($data);
        Mail::to(env('MAIL_ADDRESS'))->send($mail);

        return response('Mail sent', 204);
    }
}
