<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsitePage extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'content',
        'banner_image',
        'is_active',
    ];
}
