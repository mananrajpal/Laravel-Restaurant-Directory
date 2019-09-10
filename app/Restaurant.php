<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
  protected $table = 'restaurants'; // Define the table name
    public $incrementing = true;
    public $timestamps = false;
    protected $primaryKey = "id";
    protected $fillable = ['name', 'phone', 'address1', 'address2', 'suburb', 'state', 'numberofseats', 'country_id', 'category_id'];

    public function posts()
    {
      return $this->hasMany('App\Post', 'restaurant_id');
    }

    public function country()
    {
      return $this->belongsTo('App\Country', 'country_id');
    }

    public function category()
    {
      return $this->belongsTo('App\Category', 'category_id');
    }

    /*public function category()
      {
        return $this->hasOne('App\Category', 'id', 'category_id');
      }*/
      /*public function country()
      {
        return $this->hasOne('App\Country', 'id', 'country_id');
      }*/
}
