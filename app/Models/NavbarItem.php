<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NavbarItem extends Model
{
    protected $fillable = [
        'title',
        'url',
        'type',
        'target',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }
}
