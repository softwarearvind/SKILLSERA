<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class CourseModule extends Model
{
    protected $fillable = [
        'course_id',
        'title',
        'slug',
        'description',
        'sort_order',
        'is_active',
    ];

    protected $casts = [
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
    | Study Materials
    |--------------------------------------------------------------------------
    */

    public function studyMaterials(): HasMany
    {
        return $this->hasMany(
            StudyMaterial::class,
            'module_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Online Tests
    |--------------------------------------------------------------------------
    */

    public function onlineTests(): HasMany
    {
        return $this->hasMany(
            OnlineTest::class,
            'module_id'
        );
    }

    /*
    |--------------------------------------------------------------------------
    | Student Progress
    |--------------------------------------------------------------------------
    */

    public function studentProgress(): HasMany
    {
        return $this->hasMany(
            StudentProgress::class,
            'module_id'
        );
    }
}