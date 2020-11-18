<?php

namespace App\Listeners;

use App\Events\PostUpdated as Post;
use App\Mail\PostUpdated;
use App\Models\User;

class SendPostUpdatedNotification
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
            new PostUpdated($event->post)
        );
    }
}
