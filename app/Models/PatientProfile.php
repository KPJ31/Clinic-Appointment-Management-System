<?php

namespace App\Models;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PatientProfile extends Model
{
    protected $fillable = [
        'boold_group',
        'emergency_contact',
        'medical_note',

        'patient_id',
    ];

    public function patient(): BelongsTo {
        return $this->belongsTo(Patient::class, 'patient_id');
    }
}
