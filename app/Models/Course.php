<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Course extends Model
{
    protected $fillable = [
        'name',
        'code',
        'description',
        'duration',
        'fees',
        'mode',
        'thumbnail',
        'is_active',
    ];

    protected $casts = [
        'fees' => 'decimal:2',
        'is_active' => 'boolean',
    ];

    public function modules(): HasMany
    {
        return $this->hasMany(CourseModule::class)
            ->orderBy('sort_order');
    }

    public function batches(): HasMany
{
    return $this->hasMany(Batch::class);
}

public function studyMaterials(): HasMany
{
    return $this->hasMany(StudyMaterial::class);
}

public function onlineTests(): HasMany
{
    return $this->hasMany(OnlineTest::class);
}

public function studentProgress()
{
    return $this->hasMany(
        StudentProgress::class,
        'course_id'
    );
}

public function certificates()
{
    return $this->hasMany(
        Certificate::class,
        'course_id'
    );
}
}
