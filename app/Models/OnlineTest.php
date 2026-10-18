<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class OnlineTest extends Model
{
    protected $fillable = [
        'course_id',
        'module_id',
        'title',
        'description',
        'duration_minutes',
        'total_marks',
        'passing_marks',
        'attempts_allowed',
        'start_at',
        'end_at',
        'is_active',
    ];

    protected $casts = [
        'start_at' => 'datetime',
        'end_at' => 'datetime',
        'is_active' => 'boolean',
    ];

    public function course(): BelongsTo
    {
        return $this->belongsTo(Course::class);
    }

    public function module(): BelongsTo
    {
        return $this->belongsTo(
            CourseModule::class,
            'module_id'
        );
    }

    public function questions(): HasMany
    {
        return $this->hasMany(
            TestQuestion::class,
            'test_id'
        )->orderBy('sort_order');
    }

    public function attempts(): HasMany
{
    return $this->hasMany(
        TestAttempt::class,
        'test_id'
    );
}


}
