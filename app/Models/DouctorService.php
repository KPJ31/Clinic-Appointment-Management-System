<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DouctorService extends Model
{
    protected $table = 'doctor_service';

    protected $fillable = [
        'doctor_id',
        'service_id',
    ];
}
