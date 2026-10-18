<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

#[Fillable(['name', 'email', 'password','role','is_active'])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

     public function isSuperAdmin(): bool
    {
        return $this->role === 'super_admin';
    }

    public function isStudent(): bool
    {
        return $this->role === 'student';
    }

    public function batches(): BelongsToMany
{
    return $this->belongsToMany(
        Batch::class,
        'batch_student',
        'student_id',
        'batch_id'
    )->withPivot([
        'joined_at',
        'is_active',
    ])->withTimestamps();
}

public function attendances(): HasMany
{
    return $this->hasMany(
        Attendance::class,
        'student_id'
    );
}

public function certificates()
{
    return $this->hasMany(
        Certificate::class,
        'student_id'
    );
}
}
