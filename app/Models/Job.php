<?php

namespace App\Models;

use App\Models\Application;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'employer_id',
        'employer_name',
        'title',
        'job_type',
        'level',
        'location',
        'salary',
        'deadline',
        'summary',
        'responsibility',
        'qualification',
        'benefit',
        'apply_email',
        'whatsapp',
        'status',
    ];

    protected $casts = [
        'deadline' => 'datetime', // <-- ini penting
    ];
    
    public function employer() {
        return $this->belongsTo(User::class, 'employer_id');
    }

    public function applications()
{
    return $this->hasMany(Application::class);
}

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function savedBy()
    {
        return $this->hasMany(SavedJob::class);
    }


}
