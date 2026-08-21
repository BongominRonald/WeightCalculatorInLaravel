<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NewsletterController extends Controller
{
    public function subscribe(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
        ]);

        try {
            $exists = DB::table('newsletter_subscribers')
                ->where('email', $request->email)
                ->exists();

            if ($exists) {
                return back()->with('newsletter_error', 'You are already subscribed!');
            }

            DB::table('newsletter_subscribers')->insert([
                'email' => $request->email,
                'created_at' => now(),
                'updated_at' => now(),
            ]);

            return back()->with('newsletter_success', 'Thank you for subscribing!');
        } catch (\Exception $e) {
            return back()->with('newsletter_error', 'Something went wrong. Please try again.');
        }
    }
}
