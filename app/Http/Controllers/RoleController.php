<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Role;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // Retrieve all the orders
       $roles = role::all();
       // Load the view and pass the orders
       return View::make('roles.index')
       ->with('roles', $roles);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return View::make('roles.create');
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
       );
       $validator = Validator::make(Input::all(), $rules);
       if ($validator->fails()) {
         return Redirect::to('roles/create')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // Store the data to the database
         $role = new Role;
         $role->name = Input::get('name');
         $role->save();
         // redirect
         Session::flash('message', 'Successfully added Role!');
         return Redirect::to('roles');
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
       $role  = Role::find($id);
       // show the view and pass the order to it
       return View::make('roles.show')
       ->with('role', $role);
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
       $role = Role::find($id);
       // show the edit form and pass the order
       return View::make('roles.edit')
       ->with('role', $role);
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
       );
       $validator = Validator::make(Input::all(), $rules);

       // process the login
       if ($validator->fails()) {
         return Redirect::to('roles/' . $id . '/edit')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // store
         $role = Role::find($id);
         $role->name = Input::get('name');
         $role->save();
         // redirect
         Session::flash('message', 'Successfully updated role!');
         return Redirect::to('roles');
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
       $role = Role::find($id);
       $role->delete();
       // redirect
       Session::flash('message', 'Successfully deleted the role!');
       return Redirect::to('roles');
     }
}
