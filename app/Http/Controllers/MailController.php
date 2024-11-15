<?php

namespace App\Http\Controllers;

use App\Mail\ConfirmationMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    public function email(){
        $to="mdwaseemsekh3116@gmail.com";
        $msg="this is the confimation massage to check mail";
        $sub="check mail delivery";

        Mail::to($to)->send(new ConfirmationMail($msg,$sub));
    }
}
