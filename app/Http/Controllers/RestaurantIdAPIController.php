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

//Retrieve restaurants based on country ID and category ID
class RestaurantIdAPIController extends Controller
{
  public function show(Request $request)
  {
    $rules = array(
      /*'country_id' => 'required|integer|min:0'
      'category_id' => 'required|integer|min:0'*/
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $Restaurant = Restaurant::where('country_id', '=', $request['country_id'])
      ->where('category_id', '=', $request['category_id'])->get();
      return response()->json($Restaurant, 201);
    }
  }
}
