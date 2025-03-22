<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    // Allow mass assignment for these fields
    protected $fillable = [
        'user_id',
        'license_number',
        'certifications',
        'experience_years',
        'bio',
    ];
}
