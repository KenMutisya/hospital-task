<?php

namespace App\Models\Enums;

enum UserTypes: string
{

    case Doctor='Doctor';
    case Receptionist='Receptionist';
    case LabTech='Lab Tech';
}
