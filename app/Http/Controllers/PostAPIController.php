<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class PostAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Post::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
          'content' => 'required|max:255',
          'restaurant_id' => 'required|numeric|max:9999999999',
          'user_id' => 'required|numeric|max:999999999'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
          return response()->json($validator->errors(),422);
        }
        else {
          $post = Post::create($request->all());
          return response()->json($post, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
      $rules = [
        'id' => 'required|max:999999999|numeric',
        'content' => 'required|max:255',
        'restaurant_id' => 'required|numeric|max:9999999999',
        'user_id' => 'required|numeric|max:999999999'
      ];
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
      {
        return response()->json($validator->errors(),422);
      }
      else {
        $post = Post::find($request['id']);
        $post->update($request->all());
        return response()->json($post, 201);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $post = Post::find($request['id']);
        $post->delete();
        return response()->json(null, 204);
    }
}
