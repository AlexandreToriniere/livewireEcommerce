<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mail;
use App\Mail\MyEmail;

class TestMailController extends Controller
{
    public function index()
    {
        $subject = 'Test Subject';
        $body = 'Louloune Coucou';

        Mail::to('torinierej@gmail.com')->send(new MyEmail($subject, $body));
    }

}
