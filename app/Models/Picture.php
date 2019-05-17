<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    /**
    * Picture have multi question
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }
}
