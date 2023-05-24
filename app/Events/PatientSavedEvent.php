<?php

namespace App\Events;

use App\Models\Patient;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PatientSavedEvent implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public function __construct(public Patient $patient)
    {
    }

    public function broadcastOn()
    {
        return [
                new PresenceChannel('patients'),
        ];
    }
}
