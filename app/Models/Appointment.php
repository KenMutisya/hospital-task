<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Appointment extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable=[
            'patient_id',
            'user_id',
            'appointment_date',
            'ticket_number',
            'doctor_id',
            'status',
    ];

    protected $casts=[
            'appointment_date'=>'datetime',
    ];
}
