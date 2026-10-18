<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Certificate extends Model
{
    protected $fillable = [
        'student_id',
        'course_id',
        'certificate_number',
        'title',
        'issue_date',
        'completion_date',
        'percentage',
        'grade',
        'description',
        'certificate_file',
        'is_active',
    ];

    protected $casts = [
        'issue_date' => 'date',
        'completion_date' => 'date',
        'percentage' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(
            User::class,
            'student_id'
        );
    }

    public function course(): BelongsTo
    {
        return $this->belongsTo(
            Course::class,
            'course_id'
        );
    }
}
