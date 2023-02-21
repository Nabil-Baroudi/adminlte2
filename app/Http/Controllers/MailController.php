<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

use App\Mail\WelcomeMail;

class MailController extends Controller
{
    public function send()
    {
        $user = auth()->user();
        Mail::to($user->email)->send(new WelcomeMail());
        return new WelcomeMail();
    }
}
