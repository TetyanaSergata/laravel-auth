<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = [
      'user_id',
      'title',
      'body',
      'slug',
      'updated_at'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    // Creiamo le relazioni
    // (Tanti post - Tanti tag : Many To Many)
    public function tags()
    {
      return $this->belongsToMany('App\Tag');
    }
}
