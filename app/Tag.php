<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
  protected $fillable = [
    'name'
  ];

  // Creiamo le relazioni
  // (Tanti post - Tanti tag : Many To Many)
  public function posts()
  {
    return $this->belongsToMany('App\Post');
  }
}
