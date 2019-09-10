<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Category;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function index()
     {
       // Retrieve all the orders
       $categories = Category::all();
       // Load the view and pass the orders
       return View::make('categories.index')
       ->with('categories', $categories);
     }

     /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
     public function create()
     {
       return View::make('categories.create');
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
         return Redirect::to('categories/create')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // Store the data to the database
         $category = new Category;
         $category->name = Input::get('name');
         $category->save();
         // redirect
         Session::flash('message', 'Successfully added category!');
         return Redirect::to('categories');
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
       $category  = Category::find($id);
       // show the view and pass the order to it
       return View::make('categories.show')
       ->with('category', $category);
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
       $category = Category::find($id);
       // show the edit form and pass the order
       return View::make('categories.edit')
       ->with('category', $category);
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
         return Redirect::to('categories/' . $id . '/edit')
         ->withErrors($validator)
         ->withInput(Input::except('password'));
       } else {
         // store
         $category = Category::find($id);
         $category->name = Input::get('name');
         $category->save();
         // redirect
         Session::flash('message', 'Successfully updated category!');
         return Redirect::to('categories');
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
       $category = Category::find($id);
       $category->delete();
       // redirect
       Session::flash('message', 'Successfully deleted the category!');
       return Redirect::to('categories');
     }
}
