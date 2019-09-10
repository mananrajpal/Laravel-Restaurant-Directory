<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CommentAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Comment::all();
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
          'post_id' => 'required|max:100000000|numeric',
          'user_id' => 'required|max:100000000|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
          return response()->json($validator->errors(), 422);
        }
        else {
          $comment = Comment::create($request->all());
          return response()->json($comment, 201);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
        'id' => 'required|max:100000000|numeric',
        'content' => 'required|max:255',
        'post_id' => 'required|max:100000000|numeric',
        'user_id' => 'required|max:100000000|numeric'
      ];

      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
      {
        return response()->json($validator->errors(), 422);
      }
      else {
        $comment = Comment::find($request['id']);
        $comment->update($request->all());
        return response()->json($comment, 200);
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
        $comment = Comment::find($request['id']);
        $comment->delete();
        return response()->json(null, 204);
    }
}
