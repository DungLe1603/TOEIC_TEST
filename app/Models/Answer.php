<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
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
