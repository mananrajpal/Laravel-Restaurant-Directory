<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Country;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;
use Carbon\Carbon;
use Validator;
use Input;
use Session;
use Redirect;

class CountryAPIController extends Controller
{
  public function index()
  {
    return Country::all();
  }
  public function create()
  {
  //
  }
  public function store(Request $request)
  {
    $rules = array(
      'name' => 'required|max:255',
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $country = Country::create($request->all());
      return response()->json($country, 201);
    }
  }
  public function show(Request $request)
  {
    $rules = array(
      'id' => 'required|integer|min:0',
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $country = Country::find($request['id']);
      return response()->json($country, 201);
    }
  }
  public function edit($id)
  {
    //
  }
  public function update(Request $request)
  {
    $rules = array(
      'id' => 'required|integer|min:0',
      'name' => 'required|max:255'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $country = Country::find($request['id']);
      $country->update($request->all());
      return response()->json($country, 200);
    }
  }
    public function destroy(Request $request)
  {
    $rules = array(
      'id' => 'required|integer|min:0',
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $country = Country::find($request['id']);
      $country->delete();
      return response()->json(null, 204);
    }
  }
}
