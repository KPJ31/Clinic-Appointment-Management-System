<?php

namespace App\Models;

use App\Models\PatientProfile;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Patient extends Model
{
    protected $fillable = [
        'name',
        'phone',
        'email',
        'dob',
        'gender',
        'address',
    ];

    public function profile(): HasOne {
        return $this->hasOne(PatientProfile::class, 'patient_id');
    }

    public function appointments(): HasMany {
        return $this->hasMany(Appointment::class, 'patient_id');
    }
}
