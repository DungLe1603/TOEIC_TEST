<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
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
}
