<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OLevelSubject extends Model
{
    protected $table = 'olevel_subjects';

    protected $fillable = ['user_id', 'name', 'is_compulsory'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
