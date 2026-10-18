<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class TestQuestion extends Model
{
    protected $fillable = [
        'test_id',
        'question',
        'question_type',
        'marks',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function test(): BelongsTo
    {
        return $this->belongsTo(
            OnlineTest::class,
            'test_id'
        );
    }

    public function options(): HasMany
    {
        return $this->hasMany(
            TestOption::class,
            'question_id'
        )->orderBy('sort_order');
    }
}
