<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ALevelSubject extends Model
{
    protected $table = 'alevel_subjects';

    protected $fillable = ['user_id', 'subject_name', 'category'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
