<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ALevelScore extends Model
{
    protected $table = 'alevel_scores';

    protected $fillable = ['user_id', 'subject_name', 'grade', 'points', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
