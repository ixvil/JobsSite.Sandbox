<?php

namespace App\Events;

use App\Vacancy;
use Illuminate\Broadcasting\Channel;
use Illuminate\Console\Scheduling\Event;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewVacancyAppeared extends Event
{
    use InteractsWithSockets, SerializesModels;
    public $vacancy;


    /**
     * Create a new event instance.
     * @param Vacancy $vacancy
     */
    public function __construct(Vacancy $vacancy)
    {
        $this->vacancy = $vacancy;

    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
