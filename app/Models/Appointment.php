<?php

namespace App\Models;

use App\Models\Enums\Departments;
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
            'department',
            'parent_id',
            'diagonsis',
            'prescription',
    ];

    protected $casts=[
            'appointment_date'=>'datetime',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeConsulations($query)
    {
        $query->where('department', Departments::consultations->value);
    }

    public function scopelabappointments($query)
    {
        $query->where('department', Departments::lab->value);
    }

}
