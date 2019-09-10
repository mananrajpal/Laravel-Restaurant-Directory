<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
  protected $table = 'posts'; // Define the table name
    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = ['content', 'restaurant_id', 'user_id'];

    public function comments()
    {
      return $this->hasMany('App\Comment', 'post_id');
    }

    public function user()
    {
      return $this->belongsTo('App\User', 'user_id');
    }

    public function Restaurant()
    {
      return $this->belongsTo('App\Restaurant', 'restaurant_id');
    }
}
