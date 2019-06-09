<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'test_id', 'user_id', 'listening_score', 'reading_score',
    ];
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
