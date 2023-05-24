<?php

namespace App\Models\Enums;

enum AppointmentStatus: string
{
    case PENDING='pending';
    case IN_PROGRESS='in progress';
    case DONE='done';
}
