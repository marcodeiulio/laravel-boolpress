<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use App\Mail\ContactMail;

class ContactMailController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->all();

        // # VALIDATION
        // ? Non utilizziamo request()->validate() perché quella, in caso di fallimento, mi rimanda sulla pagina precedente. Qui siamo su API e non possiamo essere rimandati in un'altra pagina in caso di errore.
        // ? In ogni caso, request()->validate() è una scorciatoia che utilizza questa stessa Facade
        $validator = Validator::make($data, [
            'email' => 'required|email',
            'message' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['errors' => $validator->errors()]);
        }

        $mail = new ContactMail($data);
        Mail::to(env('MAIL_ADDRESS'))->send($mail);

        return response('Mail sent', 204);
    }
}
