<?php

namespace App\Models;

use App\Models\Doctor;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'fee',
    ];

    public function doctors(): BelongsToMany {
        return $this->belongsToMany(Doctor::class, 'doctor_services', 'doctor_id', 'service_id');
    }
}
