<?php

namespace App\Models;

use App\Events\PatientSavedEvent;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Patient extends Model
{
    use SoftDeletes, HasFactory;

    protected $fillable=[
            'first_name',
            'last_name',
            'date_of_birth',
            'email',
            'phone_number',
            'blood_group',
            'sex',
            'address',
            'status',
    ];

    protected $casts=[
            'date_of_birth'=>'datetime',
    ];

    protected $dispatchesEvents=[
            'created' => PatientSavedEvent::class
    ];

    protected function name(): Attribute
    {
        return Attribute::make(
                get: fn(mixed $value, array $attributes) => $attributes['first_name'] . ' ' . $attributes['last_name'],
        );
    }
}
