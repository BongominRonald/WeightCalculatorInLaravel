<?php

namespace App\Http\Controllers;

use App\Mail\ContactMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    public function send(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'message' => 'required|string|min:10',
        ]);

        try {
            Mail::to(config('mail.from.address'))->send(new ContactMail($data));

            return redirect()->route('mail-success')->with('success', 'Your message has been sent successfully!');
        } catch (\Exception $e) {
            return back()->withInput()->with('error', 'Failed to send your message. Please try again later.');
        }
    }
}
