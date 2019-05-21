<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupQuestion extends Model
{
    /**
    * Question has many answers
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }

    /**
    * Question has many answers
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function questions()
    {
        return $this->hasMany(Question::class, 'group_id');
    }
}
