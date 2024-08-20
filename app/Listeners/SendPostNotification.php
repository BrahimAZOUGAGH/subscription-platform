<?php

namespace App\Listeners;

use App\Events\PostPublished;
use App\Mail\NewPostNotification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendPostNotification implements ShouldQueue
{
    use InteractsWithQueue;

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(PostPublished $event)
    {
        $subscribers = $event->post->website->subscribers;

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->queue(new NewPostNotification($event->post));
        }
    }
}
