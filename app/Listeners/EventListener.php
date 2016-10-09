<?php

namespace App\Listeners;


use App\Events\NewVacancyAppeared;
use App\Events\SomeEvent;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class EventListener
{
    /**
     * Create the event listener.
     *
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @param NewVacancyAppeared $event
     */
    public function handle(NewVacancyAppeared $event)
    {

    }
}
