<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Doctor extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'consulatation_fee',
        'available_from',
        'available_to',

        'specialization_id',
    ];

    public function specialization(): BelongsTo
    {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function appointments(): HasMany
    {
        return $this->hasMany(Appointment::class, 'doctor_id');
    }

    public function services(): BelongsToMany
    {
        return $this->belongsToMany(Service::class, 'doctor_service', 'doctor_id', 'service_id');
    }
}
