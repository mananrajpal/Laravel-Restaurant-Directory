<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\RoleUser;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RoleUserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // Retrieve all the orders
       $role_users = RoleUser::all();
       // Load the view and pass the orders
       return View::make('role_users.index')
       ->with('role_users', $role_users);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return View::make('role_users.create');
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
         'user_id' => 'required',
         'role_id' => 'required',
       );
       $validator = Validator::make(Input::all(), $rules);
       if ($validator->fails()) {
         return Redirect::to('role_users/create')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // Store the data to the database
         $role_users = new RoleUser;
         $role_users->user_id = Input::get('user_id');
         $role_users->role_id = Input::get('role_id');
         $role_users->save();
         // redirect
         Session::flash('message', 'Successfully added RoleUser!');
         return Redirect::to('role_users');
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
       $role_users  = RoleUser::find($id);
       // show the view and pass the order to it
       return View::make('role_users.show')
       ->with('role_users', $role_users);
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
       $role_users = RoleUser::find($id);
       // show the edit form and pass the order
       return View::make('role_users.edit')
       ->with('role_users', $role_users);
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
         'user_id' => 'required',
         'role_id' => 'required',
       );
       $validator = Validator::make(Input::all(), $rules);

       // process the login
       if ($validator->fails()) {
         return Redirect::to('role_users/' . $id . '/edit')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // store
         $role_users = RoleUser::find($id);

         $role_users->user_id = Input::get('user_id');
         $role_users->role_id = Input::get('role_id');

         $role_users->save();
         // redirect
         Session::flash('message', 'Successfully updated role_user!');
         return Redirect::to('role_users');
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
       $role_users = RoleUser::find($id);
       $role_users->delete();
       // redirect
       Session::flash('message', 'Successfully deleted the role_user!');
       return Redirect::to('role_users');
     }
}
