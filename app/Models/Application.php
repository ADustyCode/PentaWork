<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    protected $fillable = [
        'jobseeker_id',
        'job_id',
        'status',
    ];

    public function jobseeker()
    {
        return $this->belongsTo(User::class, 'jobseeker_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
