<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostImage extends Model
{
    protected $table = "";
    protected $fillable = [
      'image','user_id','post_id'
    ];
}
