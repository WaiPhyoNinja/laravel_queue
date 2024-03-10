<?php

namespace App\Providers;

use App\Models\User;
use App\Jobs\SendEmailJob;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\Queue;
use Illuminate\Queue\Events\JobFailed;
use Illuminate\Support\ServiceProvider;
use Illuminate\Queue\Events\JobProcessed;
use App\Notifications\QueueFailedNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // Event::listen(JobProcessed::class, [SendEmailJob::class, 'processed']);
        Queue::failing(function (JobFailed $event) {
            $user = User::find(1); // Get the user you want to notify
            $user->notify(new QueueFailedNotification($event));
        });
    }
}
