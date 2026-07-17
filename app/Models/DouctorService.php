<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DouctorService extends Model
{
    protected $fillable = [
        'doctor_id',
        'service_id',
    ];
}
