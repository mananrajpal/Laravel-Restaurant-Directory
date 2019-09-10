<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

use App\Http\Requests\StoreRestaurant;

class RestaurantController extends Controller
{
  /**
  * Display a listing of the resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function index()
  {
    // Retrieve all the orders
    $restaurants = restaurant::all();
    // Load the view and pass the orders
    return View::make('restaurants.index')
    ->with('restaurants', $restaurants);
  }

  /**
  * Show the form for creating a new resource.
  *
  * @return \Illuminate\Http\Response
  */
  public function create()
  {
    return View::make('restaurants.create');
  }

  /**
  * Store a newly created resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @return \Illuminate\Http\Response
  */
  public function store(StoreRestaurant $request)
  {
      // Store the data to the database
      $restaurant = new Restaurant;
      $restaurant->name = Input::get('name');
      $restaurant->phone = Input::get('phone');
      $restaurant->address1 = Input::get('address1');
      $restaurant->address2 = Input::get('address1');
      $restaurant->suburb = Input::get('suburb');
      $restaurant->state = Input::get('state');
      $restaurant->numberofseats = Input::get('numberofseats');
      $restaurant->country_id = Input::get('country_id');
      $restaurant->category_id = Input::get('category_id');

      $restaurant->save();
      // redirect
      Session::flash('message', 'Successfully added restaurant!');
      return Redirect::to('restaurants');
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
    $restaurant  = Restaurant::find($id);
    // show the view and pass the order to it
    return View::make('restaurants.show')
    ->with('restaurant', $restaurant);
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
    $restaurant = Restaurant::find($id);
    // show the edit form and pass the order
    return View::make('restaurants.edit')
    ->with('restaurant', $restaurant);
  }

  /**
  * Update the specified resource in storage.
  *
  * @param  \Illuminate\Http\Request  $request
  * @param  int  $id
  * @return \Illuminate\Http\Response
  */
  public function update(StoreRestaurant $request, $id)
  {
    // store
    $restaurant = Restaurant::find($id);

    $restaurant->name = Input::get('name');
    $restaurant->phone = Input::get('phone');
    $restaurant->address1 = Input::get('address1');
    $restaurant->address2 = Input::get('address1');
    $restaurant->suburb = Input::get('suburb');
    $restaurant->state = Input::get('state');
    $restaurant->numberofseats = Input::get('numberofseats');
    $restaurant->country_id = Input::get('country_id');
    $restaurant->category_id = Input::get('category_id');

    $restaurant->save();
    // redirect
    Session::flash('message', 'Successfully updated restaurant!');
    return Redirect::to('restaurants');
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
    $restaurant = Restaurant::find($id);
    $restaurant->delete();
    // redirect
    Session::flash('message', 'Successfully deleted the restaurant!');
    return Redirect::to('restaurants');
  }
}
