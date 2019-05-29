<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'question_id', 'content', 'correct_flag'
    ];

    /**
    * Answer belongs to question
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function question()
    {
        return $this->belongsTo(Question::class);
    }
}
