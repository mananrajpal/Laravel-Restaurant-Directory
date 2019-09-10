<?php
namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  protected $table = 'comments'; // Define the table name
    public $incrementing = true;
    public $timestamps = true;
    protected $primaryKey = "id";
    protected $fillable = ['content', 'post_id', 'user_id'];

    public function user()
    {
      return $this->belongsTo('App\User', 'id');
    }

    public function post()
    {
      return $this->belongsTo('App\Post', 'id');
    }
}
