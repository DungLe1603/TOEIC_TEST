<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'skill_id', 'description'
    ];
    /**
    * Part belongs to skill
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function skill()
    {
        return $this->belongsTo(Skill::class);
    }
}
