<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Picture extends Model
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
    * Picture have multi question
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function questions()
    {
        return $this->hasMany(Question::class);
    }

    /**
     * Get the picture.
     *
     * @param string $imageName imageName
     *
     * @return string
     */
    public function getPathAttribute($imageName)
    {
        if (empty($imageName)) {
            return config('define.path.default_image');
        }
        return asset('upload/' . $imageName);
    }
}
