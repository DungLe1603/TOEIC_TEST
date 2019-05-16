<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id', 'test_id', 'parent_id', 'content', 'status'
    ];

    /**
     * Get the user for this comment.
     *
     * @return void
     */
    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    /**
     * Get the test for this comment.
     *
     * @return void
     */
    public function test()
    {
        return $this->belongsTo('App\Models\Test');
    }
}
