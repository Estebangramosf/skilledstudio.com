<?php

namespace App;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'role',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function posts(){
        return $this->hasMany(Post::class,'user_id');
    }

    public function galleries(){
        return $this->hasMany(Gallery::class,'user_id');
    }

    public function multimedia(){
        return $this->hasMany(Multimedia::class,'user_id');
    }

    public function comments(){
        return $this->hasMany(Comment::class,'user_id');
    }
}
