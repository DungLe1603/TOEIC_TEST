<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Voice extends Model
{
    /**
    * The attributes that are mass assignable.
    *
    * @var array
    */
    protected $fillable = [
       'path'
    ];

    /**
    * Voice have multi question
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the voice.
     *
     * @param string $path path
     *
     * @return string
     */
    public function getPathAttribute($path)
    {
        if (empty($path)) {
            return config('define.path.default_voice');
        }
        return asset('upload/' . $path);
    }
}
