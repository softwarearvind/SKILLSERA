<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OfferRequest extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'address',
        'course_id',
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }
}
