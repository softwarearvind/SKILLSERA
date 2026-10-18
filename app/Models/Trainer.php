<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Trainer extends Model
{
    protected $fillable = [
        'name',
        'designation',
        'experience',
        'description',
        'skills',
        'photo',
        'linkedin_url',
        'email',
        'is_active',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'skills' => 'array',
            'is_active' => 'boolean',
        ];
    }
}
