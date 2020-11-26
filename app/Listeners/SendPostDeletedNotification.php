<?php

namespace App\Listeners;

use App\Mail\PostDeleted;
use App\Events\PostDeleted as Post;
use App\Models\User;

class SendPostDeletedNotification
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
            new PostDeleted($event->post)
        );
    }
}
