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

class RoleAPIController extends Controller
{
  public function index()
  {
    return Role::all();
  }
  public function create()
  {
  //
  }
  public function store(Request $request)
  {
    $rules = array(
      'name' => 'required|max:255'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $Role = Role::create($request->all());
      return response()->json($Role, 201);
    }
  }
  public function show(Request $request)
  {
    $rules = array(
      'id' => 'required|integer|min:0'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $Role = Role::find($request['id']);
      return response()->json($Role, 201);
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
      $Role = Role::find($request['id']);
      $Role->update($request->all());
      return response()->json($Role, 200);
    }
  }
    public function destroy(Request $request)
  {
    $rules = array(
      'id' => 'required|integer|min:0'
    );
    $validator = Validator::make(Input::all(), $rules);
    if ($validator->fails()) {
      return response()->json(['errors'=>$validator->errors()]);
    } else {
      $Role = Role::find($request['id']);
      $Role->delete();
      return response()->json(null, 204);
    }
  }
}
