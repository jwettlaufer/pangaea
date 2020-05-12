<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Post extends Model

{
  //
  protected $fillable = array(
    'message',
  );

  public function user()
  {
    return $this->belongsTo('App\User');
  }

  public function comments()
  {
    return $this->morphMany('App\Comment', 'commentable')->whereNull('parent_id');
  }

  public function liked()
  {
    return (bool) Like::where('user_id', Auth::id())
      ->where('post_id', $this->id)
      ->first();
  }

  public function likes()
  {
    return $this->hasMany(Like::class, 'post_id');
  }
}
