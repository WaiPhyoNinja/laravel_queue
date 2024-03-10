<?php

namespace App\Jobs;

use App\Mail\MyEmail;
use Illuminate\Bus\Queueable;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\SerializesModels;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Support\Facades\DB;
use Illuminate\Queue\Events\JobProcessed;

class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $emailData;
    protected $userClickTime;

    /**
     * Create a new job instance.
     *
     * @param array $emailData
     * @return void
     */
    public function __construct($emailData, $userClickTime)
    {
        $this->emailData = $emailData;
        $this->userClickTime = $userClickTime;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        $emailData = $this->emailData;
        Mail::to($emailData['email'])
            ->send(new MyEmail('email subject', 'email content'));

        DB::table('email_logs')->insert([
            'email' => $emailData['email'],
            'sent_at' => $this->userClickTime,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Log::info('Email sent out-time: ' . $this->userClickTime);
    }

    /**
     * The job has been processed.
     *
     * @param  JobProcessed  $event
     * @return void
     */
    public function processed(JobProcessed $event)
    {
        // Save email send time to database
        $emailData = $this->emailData;
        $sentAt = now();

        DB::table('email_logs')->insert([
            'email' => $emailData['email'],
            // 'sent_at' => $sentAt,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        Log::info('Email sent out-time: ' . $sentAt);
    }
}
