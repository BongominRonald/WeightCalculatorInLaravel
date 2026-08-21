<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    protected $fillable = [
        'user_id', 'olevel_weight', 'alevel_weight', 'total_points',
        'gender_bonus', 'cutoff', 'total_weight', 'eligibility',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
