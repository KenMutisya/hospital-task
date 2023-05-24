<?php

namespace App\Listeners;

use App\Events\PatientSavedEvent;

class GenerateTicketListener
{
    public function __construct()
    {
    }

    public function handle(PatientSavedEvent $event)
    {

    }
}
