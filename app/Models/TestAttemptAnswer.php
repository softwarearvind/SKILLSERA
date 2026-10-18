<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class TestAttemptAnswer extends Model
{
    protected $fillable = [
        'attempt_id',
        'question_id',
        'option_id',
        'marks_obtained',
        'is_correct',
    ];

    protected $casts = [
        'is_correct' => 'boolean',
    ];

    public function attempt(): BelongsTo
    {
        return $this->belongsTo(
            TestAttempt::class,
            'attempt_id'
        );
    }

    public function question(): BelongsTo
    {
        return $this->belongsTo(
            TestQuestion::class,
            'question_id'
        );
    }

    public function option(): BelongsTo
    {
        return $this->belongsTo(
            TestOption::class,
            'option_id'
        );
    }
}
