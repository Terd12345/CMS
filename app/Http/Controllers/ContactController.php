<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Log;
use App\Mail\ContactMail;
use App\Jobs\SendContactEmail;

class ContactController extends Controller
{

    public function send(Request $request)
{
    $data = $request->validate([
        'name'    => 'required|string',
        'email'   => 'required|email',
        'subject' => 'required|string',
        'message' => 'required|string',
    ]);

    // Dispatch the email job asynchronously
    dispatch(new SendContactEmail($data));

    return back()->with('success', 'Your message has been sent successfully!');
}

}
