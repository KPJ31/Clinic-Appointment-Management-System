<?php

namespace App\Models;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Appointment extends Model
{
    protected $fillable = [
        'appointment_date',
        'appointment_time',
        'reason',
        'status',

        'doctor_id',
        'patient_id',
    ];

    public function doctors(): BelongsTo {
        return $this->belongsTo(Doctor::class, 'doctor_id');
    }

    public function patients(): BelongsTo {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
