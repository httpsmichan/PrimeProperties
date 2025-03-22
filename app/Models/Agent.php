<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agent extends Model
{
    protected $primaryKey = 'user_id'; // Set 'user_id' as the primary key
    public $incrementing = false; // Since user_id is not an auto-incrementing primary key

    protected $fillable = [
        'user_id',
        'license_number',
        'certifications',
        'years_experience',
        'bio',
        'profile_picture',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
