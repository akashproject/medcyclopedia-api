<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Booking;

class BookingController extends Controller
{
    //
	public $_statusOK = 200;
    public $_statusErr = 500;
	
	public function create(Request $request) {
		$requestData = $request->all();
		try {
			$requestData['date'] = date('Y-m-d', strtotime($requestData['date']));
			
			$booking = Booking::insertGetId($requestData);
			return response()->json($booking, 201);
		  return response()->json(['success'], 200);
		} catch(\Illuminate\Database\QueryException $e){
		  return response()->json(['error' => $e->errorInfo[2]], 500);
		}
	}
}
