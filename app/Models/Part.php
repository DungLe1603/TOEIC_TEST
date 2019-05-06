<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Part extends Model
{
    const Listening = 1;
    const Reading = 2;

    public $timestamps = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'section', 'description'
    ];
}
