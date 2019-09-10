<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Restaurant;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class RestaurantAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Restaurant::all();
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
          'name' => 'required|max:255',
          'phone' => 'nullable|numeric',
          'address1' => 'required|max:255',
          'address2' => 'nullable|max:255',
          'suburb' => 'required|max:255',
          'state' => 'required|max:3',
          'numberofseats' => 'required|numeric',
          'country_id' => 'required|max:999999999|numeric',
          'category_id' => 'required|max:999999999|numeric'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
          return response()->json($validator->errors(),422);
        }
        else {
          $restaurant = Restaurant::create($request->all());
          return response()->json($restaurant, 201);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        $restaurant = Restaurant::find($request['id']);
        return response()->json($restaurant, 201);
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
        'id' => 'required|numeric|max:99999999',
        'name' => 'required|max:255',
        'phone' => 'nullable|numeric',
        'address1' => 'required|max:255',
        'address2' => 'nullable|max:255',
        'suburb' => 'required|max:255',
        'state' => 'required|max:3',
        'numberofseats' => 'required|numeric',
        'country_id' => 'required|max:999999999|numeric',
        'category_id' => 'required|max:999999999|numeric'
      ];
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
      {
        return response()->json($validator->errors(),422);
      }
      else {
        $restaurant = Restaurant::find($request['id']);
        $restaurant->update($request->all());
        return response()->json($restaurant, 200);
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Respnse $request)
    {
        $restaurant = Restaurant::find($request['id']);
        $restaurant->delete();
        return response()->json(null, 204);
    }
}
