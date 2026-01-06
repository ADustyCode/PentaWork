<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JobseekerProfile extends Model
{
    protected $fillable = [
        'user_id',
        'avatar',
        'full_name',
        'headline',
        'location',
        'job_status',
        'summary',
        'main_field',
        'experience_years',
        'skills',
        'job_preference_type',
        'job_preference_location',
        'portfolio_url',
        'linkedin_url',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
