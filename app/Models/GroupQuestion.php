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
    * Group has picture
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }

    /**
    * Group has voice
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function voice()
    {
        return $this->belongsTo(Voice::class);
    }

    /**
    * Group has questions
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function questions()
    {
        return $this->hasMany(Question::class, 'group_id');
    }
}
