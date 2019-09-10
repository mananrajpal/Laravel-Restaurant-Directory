<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AppUser extends Model
{
  protected $table = 'users'; // Define the table name
    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = ['email', 'password', 'country_id'];
}
