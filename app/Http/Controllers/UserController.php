<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // Retrieve all the orders
       $users = user::all();
       // Load the view and pass the orders
       return View::make('users.index')
       ->with('users', $users);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return View::make('users.create');
     }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
     public function store(Request $request)
     {
       // Validate
       // Read more on validation at http://laravel.com/docs/validation
       $rules = array(
         'name' => 'required',
         'email' => 'required',
         'password' => 'required',
         'country_id' => 'required',
       );
       $validator = Validator::make(Input::all(), $rules);
       if ($validator->fails()) {
         return Redirect::to('users/create')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // Store the data to the database
         $user = new User;
         $user->name = Input::get('name');
         $user->email = Input::get('email');
         $user->password = Input::get('password');
         $user->country_id = Input::get('country_id');
         $user->save();
         // redirect
         Session::flash('message', 'Successfully added User!');
         return Redirect::to('users');
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
       // Retrieve the order based on the id
       $user  = User::find($id);
       // show the view and pass the order to it
       return View::make('users.show')
       ->with('user', $user);
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
       $user = User::find($id);
       // show the edit form and pass the order
       return View::make('users.edit')
       ->with('user', $user);
     }

     /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function update(Request $request, $id)
     {
       // Validate
       // Read more on validation at http://laravel.com/docs/validation
       $rules = array(
         'name' => 'required',
         'email' => 'required',
         'password' => 'required',
         'country_id' => 'required',
       );
       $validator = Validator::make(Input::all(), $rules);

       // process the login
       if ($validator->fails()) {
         return Redirect::to('users/' . $id . '/edit')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // store
         $user = User::find($id);
         $user->name = Input::get('name');
         $user->email = Input::get('email');
         $user->password = Input::get('password');
         $user->country_id = Input::get('country_id');

         $user->save();
         // redirect
         Session::flash('message', 'Successfully updated user!');
         return Redirect::to('users');
       }
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
       $user = User::find($id);
       $user->delete();
       // redirect
       Session::flash('message', 'Successfully deleted the user!');
       return Redirect::to('users');
     }
}
