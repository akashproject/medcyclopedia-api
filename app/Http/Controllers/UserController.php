<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
	
	public function updateprofile(Request $request) {
    $requestData = $request->all();
    $loggedinUser = auth()->user();
    try {
      $user = User::findOrFail($loggedinUser->id);
      $user->update($requestData);
      return response()->json($user, 200);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
	}
   
}