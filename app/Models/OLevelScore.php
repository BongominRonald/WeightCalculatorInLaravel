<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OLevelScore extends Model
{
    protected $table = 'olevel_scores';

    protected $fillable = ['user_id', 'subject_name', 'grade', 'bucket', 'weight_value'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
