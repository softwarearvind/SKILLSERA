<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WebsiteSetting extends Model
{
    protected $fillable = [
        'site_name',
        'logo',
        'favicon',
        'phone',
        'email',
        'address',
        'gst_number',
        'gst_registered_name',
         'gst_address',
        'facebook',
        'instagram',
        'youtube',
        'linkedin',
        'meta_title',
        'meta_description',
        'meta_keywords',
    ];
}
