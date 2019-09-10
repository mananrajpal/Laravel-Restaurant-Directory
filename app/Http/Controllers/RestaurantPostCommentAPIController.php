<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Restaurant;
use App\Post;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RestaurantPostCommentAPIController extends Controller
{
  public function show(Request $request)
  {
    $rules = array(
      'id' => 'required|integer|min:0'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $Restaurant = Restaurant::with('posts.comments');
      return response()->json($Restaurant->find($request['id']), 200);
    }

    //$Restaurant = Restaurant::find($request['id'])::with('posts')->get();
    //$Restaurant = Restaurant::find($request['id'])->with('posts.comments');

    //$Restaurant = Restaurant::with('posts.comments')->where('id', '=', $request['id'])->first();


//    $result = array("Peter"=>"35", "Ben"=>"37", "Joe"=>"43");


    /*var_dump($Restaurant->posts);
    foreach($Restaurant->posts as $p){
      var_dump($p->comments);
    }*/

    /*$posts= User::all()->toArray();
    $comments= Post::all()->toArray();

    return response()->json($Restaurant, $posts, $comments, 200);*/

    //::json(array('user'=>$user,'post'=>$post,'comment'=>$comment));
    //$posts = $Restaurant->posts;
    //$comments = $posts->comments;
    /*var_dump($Restaurant->posts);
    foreach($Restaurant->posts as $p){
      var_dump($p->comments);
    }*/
    //return response()->json($Restaurant, 200);

  /*return [
    'id' => $Restaurant->id,
    'name' => $Restaurant->name,
    //TODO: FinishThis
    'posts' => $Restaurant->posts,
  ];*/
  /*foreach($Restaurant->posts as $p){
    $p;
    foreach($p->messages as $m)
    {
      $m;
    }
  }*/
    //return response()->json($Restaurant, 201);
  }
}
