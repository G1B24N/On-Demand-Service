<?php

namespace App\Http\Controllers;

// use App\Mail\ContactMail;
use Illuminate\Http\Request;
use App\Contact;
use App\User;
use Illuminate\Support\Facades\Auth;
// use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function index()
    {
        return view('contact');
    }

   public function simpan(Request $request)
   {
        $pesan = new Contact;
        $pesan->user_id = Auth::User()->id;
        $pesan->nama_lengkap = $request->nama_lengkap;
        $pesan->email = $request->email;
        $pesan->phone_number = $request->phone_number;
        $pesan->msg_subject = $request->msg_subject;
        $pesan->message = $request->message;
        $pesan->save();

        return redirect('/contact');
   }
}
