<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SavedJob extends Model
{
    use HasFactory;

    protected $fillable = [
        'jobseeker_id',
        'job_id',
    ];

    public function jobseeker()
    {
        return $this->belongsTo(User::class, 'jobseeker_id');
    }

    public function job()
    {
        return $this->belongsTo(Job::class);
    }
}
