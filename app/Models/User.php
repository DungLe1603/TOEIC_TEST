<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    const MALE = 0;
    const FEMALE = 1;
    const OTHER = 2;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'gender', 'password', 'birthday', 'avatar', 'role_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * User belong to Role
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
    
    /**
     * Get the avatar.
     *
     * @param string $imageName imageName
     *
     * @return string
     */
    public function getAvatarAttribute($imageName)
    {
        if (empty($imageName)) {
            return config('define.path.default_avatar');
        }
        return asset('upload/' . $imageName);
    }

    /**
    * User has many test result
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function results()
    {
        return $this->hasMany(Result::class);
    }
}
