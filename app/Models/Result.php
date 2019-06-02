<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    /**
    * Result belongs to user
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
    * Result belongs to test
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function test()
    {
        return $this->belongsTo(Test::class);
    }
}
