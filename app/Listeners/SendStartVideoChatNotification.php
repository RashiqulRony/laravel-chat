<?php

namespace App\Listeners;

use App\Events\StartVideoChat;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendStartVideoChatNotification
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
     * @param  \App\Events\StartVideoChat  $event
     * @return void
     */
    public function handle(StartVideoChat $event)
    {
        //
    }
}
