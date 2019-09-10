<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
  protected $table = 'roles'; // Define the table name
    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = ['name'];
}
