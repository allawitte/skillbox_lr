<?php

namespace App\Listeners;

use App\Events\PostCreated as Post;
use App\Mail\PostCreated;
use App\Models\User;

class SendPostCreatedNotification
{
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
     * @param  object $event
     * @return void
     */
    public function handle(Post $event)
    {
        \Mail::to(User::admin()->email)->send(
            new PostCreated($event->post)
        );
    }
}
