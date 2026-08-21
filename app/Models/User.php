<?php

namespace App\Models;

use Database\Factories\UserFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'gender',
        'google_id',
        'avatar',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }

    public function olevelSubjects()
    {
        return $this->hasMany(OLevelSubject::class);
    }

    public function olevelScores()
    {
        return $this->hasMany(OLevelScore::class);
    }

    public function alevelSubjects()
    {
        return $this->hasMany(ALevelSubject::class);
    }

    public function alevelScores()
    {
        return $this->hasMany(ALevelScore::class);
    }

    public function result()
    {
        return $this->hasOne(Result::class);
    }
}
