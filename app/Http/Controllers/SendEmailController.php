<?php

namespace App\Http\Controllers;

use App\Jobs\SendMailJob;
use Illuminate\Http\Request;
use Mail;
use App\Mail\SendEmail;

class SendEmailController extends Controller
{
    // public function index()
    // {
    //     $content = [
    //         'name' => 'Ini Nama Pengirim',
    //         'subject' => 'Ini Subject Email',
    //         'body' => 'Ini adalah isi email yang dikirim dari laravel'
            
    //     ];
    //     Mail::to('daveenaalexandrapentury@mail.ugm.ac.id')->send(new SendEmail($content));
    //     return "Email telah dikirimkan";
    // }

    public function index()
    {
        return view('emails.kirim-email');
    }
    public function store(Request $request)
    {
        $data = $request->all();

        dispatch(new SendMailJob($data));
        return redirect()->route('send-email')->with('success', 'Email is sent successfully!');
    }
}
