<?php

namespace App\Models;

use App\Models\Appointment;
use App\Models\Service;
use App\Models\Specialization;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

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

    public function specializations(): BelongsTo {
        return $this->belongsTo(Specialization::class, 'specialization_id');
    }

    public function appoinments(): HasMany {
        return $this->hasMany(Appointment::class, 'appoinment_id');
    }

    public function services(): BelongsToMany {
        return $this->belongsToMany(Service::class, 'doctor_services', 'doctor_id', 'service_id');
    }
}
