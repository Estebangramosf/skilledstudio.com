<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments';
  protected $fillable = [
    'title', 'body', 'user_id'
  ];

  public function user(){
      return $this->belongsTo(User::class);
  }

  public function post(){
    return $this->belongsTo(Post::class);
  }
}
