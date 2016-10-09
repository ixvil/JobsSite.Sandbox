<?php

namespace App\Listeners;


use App\Events\NewVacancyAppeared;
use App\Events\SomeEvent;

use App\Role;
use App\User;
use App\Vacancy;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Mail;

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
        /** @var Vacancy $vacancy */
        $vacancy = $event->vacancy;

        /** @var User $moderators */
        $moderators = User::whereHas('roles', function ($q) {
            $q->where('id', Role::MODERATOR_ROLE);
        })->get();

        foreach ($moderators as $moderator) {
            Mail::send('mails/newVacancy', ['vacancy' => $vacancy], function ($m) use ($vacancy, $moderator) {
                $m->from('hello@app.com', 'Your Application');
                $m->to($moderator->email, $moderator->name)->subject('New Vacancy!');
            });
        }

    }


}
