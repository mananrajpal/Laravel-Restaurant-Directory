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


class UserAPIController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      return User::all();
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
          'email' => 'required|max:255',
          'password' => 'nullable|max:255',
          'country_id' => 'required|nummeric|max:999999999'
        ];
        $validator = Validator::make($request->all(), $rules);
        if($validator->fails())
        {
          return response()->json($validator->errors(), 422);
        }
        else {
          $user = User::create($request->all());
          return response()->json($user, 201);
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
        $user = User::find($request['id']);
        return response()->json($user, 201);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
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
        'id' => 'required|numberic|max:999999999',
        'name' => 'required|max:255',
        'email' => 'required|max:255',
        'password' => 'nullable|max:255',
        'country_id' => 'required|nummeric|max:999999999'
      ];
      $validator = Validator::make($request->all(), $rules);
      if($validator->fails())
      {
        return response()->json($validator->errors(), 422);
      }
      else {
        $user = User::find($request['id']);
        $user->update($request->all());
        return response()->json($user, 200);
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
        $user = User::find($request['id']);
        $user->delete();
        return response()->json(null, 204);
    }
}
