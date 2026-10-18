<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HeroSlide extends Model
{
      protected $fillable = [
        'title',
        'subtitle',
        'description',
        'tags',
        'logo',

        'card1_icon',
        'card1_title',
        'card1_text',

        'card2_icon',
        'card2_title',
        'card2_text',

        'card3_icon',
        'card3_title',
        'card3_text',

        'button1_text',
        'button1_url',
        'button2_text',
        'button2_url',

        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
        ];
    }
}
