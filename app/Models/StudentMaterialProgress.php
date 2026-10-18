<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StudentMaterialProgress extends Model
{
    protected $fillable = [
        'student_id',
        'material_id',
        'completed_at',
    ];

    protected $casts = [
        'completed_at' => 'datetime',
    ];

    public function student(): BelongsTo
    {
        return $this->belongsTo(User::class, 'student_id');
    }

    public function material(): BelongsTo
    {
        return $this->belongsTo(
            StudyMaterial::class,
            'material_id'
        );
    }
}
