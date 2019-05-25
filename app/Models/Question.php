<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'test_id', 'part_id', 'group_id', 'content', 'picture_id', 'voice_id'
    ];

    /**
    * Question belongs to picture
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function picture()
    {
        return $this->belongsTo(Picture::class);
    }

    /**
    * Question belongs to picture
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function voice()
    {
        return $this->belongsTo(Voice::class);
    }

    /**
    * Question belongs to test
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }

    /**
    * Question belongs to part
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function part()
    {
        return $this->belongsTo(Part::class);
    }

    /**
    * Question has many answers
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function answers()
    {
        return $this->hasMany(Answer::class);
    }

    /**
    * Question belongs to group
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function group()
    {
        return $this->belongsTo(GroupQuestion::class, 'group_id');
    }
}
