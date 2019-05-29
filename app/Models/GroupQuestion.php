<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupQuestion extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
       'type', 'picture_id', 'voice_id'
    ];

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
