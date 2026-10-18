<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestAttempt extends Model
{
    protected $fillable = [
        'test_id',
        'student_id',
        'started_at',
        'submitted_at',
        'score',
        'total_marks',
        'status',
        'is_passed',
    ];

    protected $casts = [
        'started_at' => 'datetime',
        'submitted_at' => 'datetime',
        'is_passed' => 'boolean',
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(OnlineTest::class, 'test_id');
    }

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function answers(): HasMany
    {
        return $this->hasMany(TestAttemptAnswer::class, 'attempt_id');
    }
}
