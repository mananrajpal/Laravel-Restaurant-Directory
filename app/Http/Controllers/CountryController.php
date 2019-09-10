<?php

namespace App\Http\Controllers;

use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

use Illuminate\Http\Request;

class CountryController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // Retrieve all the orders
    $countries = country::all();
    // Load the view and pass the orders
    return View::make('countries.index')
    ->with('countries', $countries);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return View::make('countries.create');
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
      return Redirect::to('countries/create')
      ->withErrors($validator)
      ->withInput(Input::except('password'));
    } else {
      // Store the data to the database
      $country = new Country;
      $country->name = Input::get('name');
      $country->save();
      // redirect
      Session::flash('message', 'Successfully added Country!');
      return Redirect::to('countries');
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
    $country  = Country::find($id);
    // show the view and pass the order to it
    return View::make('countries.show')
    ->with('country', $country);
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
    $country = Country::find($id);
    // show the edit form and pass the order
    return View::make('countries.edit')
    ->with('country', $country);
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
      return Redirect::to('countries/' . $id . '/edit')
      ->withErrors($validator)
      ->withInput(Input::except('password'));
    } else {
      // store
      $country = Country::find($id);
      $country->name = Input::get('name');
      $country->save();
      // redirect
      Session::flash('message', 'Successfully updated country!');
      return Redirect::to('countries');
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
    $country = Country::find($id);
    $country->delete();
    // redirect
    Session::flash('message', 'Successfully deleted the country!');
    return Redirect::to('countries');
  }
}
