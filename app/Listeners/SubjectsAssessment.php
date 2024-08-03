<?php

namespace App\Listeners;

use App\Events\UserRegistration;
use App\Models\Subject;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SubjectsAssessment
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(UserRegistration $event): void
    {
        $subjects = Subject::all();

        $subjectsAssessment = [];
        foreach ($subjects as $subject) {
            $subjectsAssessment[$subject->id] = ['assessment' => rand(1, 5)];
        }

        $event->user->subjects()->attach($subjectsAssessment);
    }
}
