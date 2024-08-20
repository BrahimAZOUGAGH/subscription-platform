<?php

namespace App\Services;

use App\Contracts\PostNotificationServiceInterface;
use App\Models\Website;
use App\Models\PostNotification;
use Illuminate\Support\Facades\Mail;
use App\Mail\NewPostNotification;

class PostNotificationService implements PostNotificationServiceInterface
{
    public function sendPostNotifications()
    {
        $websites = Website::with(['posts', 'subscribers'])->get();

        foreach ($websites as $website) {
            foreach ($website->posts as $post) {
                foreach ($website->subscribers as $subscriber) {
                    if (!PostNotification::where('post_id', $post->id)->where('user_id', $subscriber->id)->exists()) {
                        Mail::to($subscriber->email)->queue(new NewPostNotification($post));
                        PostNotification::create(['post_id' => $post->id, 'user_id' => $subscriber->id]);
                    }
                }
            }
        }
    }
}