<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
  protected $table = "galleries";
  protected $fillable = [
    'title','body','user_id',
  ];


  public function user(){
    return $this->belongsTo(User::class);
  }

}
