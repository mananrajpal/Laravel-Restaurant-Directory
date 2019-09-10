<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Comment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

use App\Http\Requests\StoreComment;


class CommentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // Retrieve all the orders
       $comments = comment::all();
       // Load the view and pass the orders
       return View::make('comments.index')
       ->with('comments', $comments);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return View::make('comments.create');
     }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(StoreComment $request)
     {
         // Store the data to the database
         $comment = new Comment;
         $comment->content = Input::get('content');
         $comment->post_id = Input::get('post_id');
         $comment->user_id = Input::get('user_id');

         $comment->save();
         // redirect
         Session::flash('message', 'Successfully added comment!');
         return Redirect::to('comments');
     }

     /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function show($id)
     {
       // Retrieve the order based on the id
       $comment  = Comment::find($id);
       // show the view and pass the order to it
       return View::make('comments.show')
       ->with('comment', $comment);
     }

     /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function edit($id)
     {
       // Retrieve the order
       $comment = Comment::find($id);
       // show the edit form and pass the order
       return View::make('comments.edit')
       ->with('comment', $comment);
     }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(StoreComment $request, $id)
     {
         // store
         $comment = Comment::find($id);
         $comment->content = Input::get('content');
         $comment->post_id = Input::get('post_id');
         $comment->user_id = Input::get('user_id');
         $comment->save();
         // redirect
         Session::flash('message', 'Successfully updated comment!');
         return Redirect::to('comments');
     }

     /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
       // Delete
       $comment = Comment::find($id);
       $comment->delete();
       // redirect
       Session::flash('message', 'Successfully deleted the comment!');
       return Redirect::to('comments');
     }
}
