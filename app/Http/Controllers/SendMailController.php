<?php

namespace App\Http\Controllers;

use App\Jobs\SendEmailJob;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SendMailController extends Controller
{
    public function sendEmail(Request $request)
    {
        $validatedData = $request->validate([
            'email' => 'required|email',
            'subject' => 'string',
            'content' => 'string',
        ]);

        $userClickTime = now();

        SendEmailJob::dispatch($validatedData, $userClickTime)->delay(now()->addMinute(1));

        return back()->with('success', 'Email has been queued for sending.');
    }

    public function mailLists()
    {
        $mails = DB::select('SELECT * FROM email_logs');
        return view('mail_list', compact('mails'));
    }
}
