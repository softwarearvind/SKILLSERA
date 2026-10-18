<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Batch extends Model
{
    protected $fillable = [
        'course_id',
        'name',
        'code',
        'start_date',
        'end_date',
        'start_time',
        'end_time',
        'days',
        'room',
        'mode',
        'meeting_link',
        'capacity',
        'description',
        'is_active',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
        'is_active' => 'boolean',
    ];

    /*
    |--------------------------------------------------------------------------
    | Course
    |--------------------------------------------------------------------------
    */

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    /*
    |--------------------------------------------------------------------------
    | Students
    |--------------------------------------------------------------------------
    */

    public function students(): BelongsToMany
    {
        return $this->belongsToMany(
            User::class,
            'batch_student',
            'batch_id',
            'student_id'
        )->withPivot([
            'joined_at',
            'is_active',
        ])->withTimestamps();
    }

    public function attendances(): HasMany
{
    return $this->hasMany(Attendance::class);
}
}
