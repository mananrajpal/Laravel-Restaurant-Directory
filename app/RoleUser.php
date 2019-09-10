<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoleUser extends Model
{
  protected $table = 'role_user'; // Define the table name
    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = ['user_id', 'role_id'];	
}
