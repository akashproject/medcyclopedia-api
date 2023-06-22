<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Order;
use App\Models\Address;
use App\Models\Payment;
use Illuminate\Support\Facades\DB;


class UserController extends Controller
{
  public $_statusOK = 200;
  public $_statusErr = 500;

  public function checkUserExist(Request $request){
    try {
      $requestData = $request->all();
      $exist = User::where('mobile', $requestData['mobile'])->count();
      return response()->json($exist, $this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function sendOtp(Request $request){
    try {
      $requestData = $request->all();
      $url = "https://2factor.in/API/V1/30060f8f-034f-11eb-9fa5-0200cd936042/SMS/".$requestData['mobile']."/AUTOGEN/BKWLG";

      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);

      $resp = curl_exec($curl);
      curl_close($curl);
      return response()->json($resp, $this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function verifyOtp(Request $request){
    try {
      $requestData = $request->all();

      $url = "https://2factor.in/API/V1/30060f8f-034f-11eb-9fa5-0200cd936042/SMS/VERIFY/".$requestData['session_id']."/".$requestData['otp_value'];
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
      
      $resp = curl_exec($curl);
      curl_close($curl);
      return response()->json($resp, $this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function getUserByMobile(Request $request){
    $requestData = $request->all();
    try {
      $user = User::where('mobile', $requestData['mobile'])->first();
      return response()->json($user,$this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){

      return response()->json(['error' => $e->errorInfo[2]], 401);

    }
  }

  public function registerUserByMobile(Request $request){
    $requestData = $request->all();
    try {
      $requestData['referral_code'] = "BW_".$this->random_strings(8);
      $user = User::create($requestData)->toArray();
      $payment = Payment::create(array('user_id'=> $user['id']));
      return response()->json($user,$this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){

      return response()->json(['error' => $e->errorInfo[2]], 401);

    }
  }
	

	public function saveProfile(Request $request) {
    $requestData = $request->all();
    $id = base64_decode($requestData['token']);
    try {
      $user = User::findOrFail($id);
      $user->update($requestData);
      return response()->json($user, 200);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }

	}

  public function pickups(Request $request){
    $requestData = $request->all();
    try {
      $id = base64_decode($requestData['token']);
      $order = DB::table('orders')
      ->join('product', 'orders.product_id', '=', 'product.id')
      ->where('orders.user_id', '=', $id)
      ->select('orders.*', 'product.*', 'orders.id as order_id')
      ->distinct()
      ->get();

      return response()->json($order, 200);
    } catch(\Illuminate\Database\QueryException $e){
        return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function viewOrder($id){
    try {
      $order = DB::table('orders')
      ->join('product', 'orders.product_id', '=', 'product.id')
      ->where('orders.id', '=', $id)
      ->select('orders.*', 'product.*', 'orders.id as order_id')
      ->first();
      return response()->json($order, 200);
    } catch(\Illuminate\Database\QueryException $e){
        return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function cancelOrder(Request $request){
    try {
      $requestData = $request->all();
      $user_id = base64_decode($requestData['token']);

      $params = array(
        'reason' => $requestData['reason'],
        'status' => "cancelled"
      );
      $order = Order::findOrFail($requestData['order_id']);
      $order->update($params);
      return response()->json($order, 200);
    } catch(\Illuminate\Database\QueryException $e){
        return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function getAddresses(Request $request){
    $requestData = $request->all();
    try {
        $id = base64_decode($requestData['token']);
        $address = Address::where('user_id', $id)->get();

        return response()->json($address,$this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
        return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function viewAddress($id){
    try {
        $address = Address::findOrFail($id);
        return response()->json($address,$this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
        return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function deleteAddress(Request $request){
    try {
      $requestData = $request->all();
      $user_id = base64_decode($requestData['token']);
      $address = Address::where('id', $requestData['address_id'])
                    ->where('user_id', $user_id)->first();
      $address->delete();
      return response()->json(array(true),$this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }
   
  public function saveAddress(Request $request){
    try {
      $requestData = $request->all();
      

      if(!isset($requestData['id'])){
        $requestData['user_id'] = base64_decode($requestData['token']);
        Address::create($requestData);
      } else {
          $address = Address::findOrFail($requestData['id']);
          $address->update($requestData);
      }
      return response()->json(true, $this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function getPayment(Request $request){
    try {
      $requestData = $request->all();
      $user_id = base64_decode($requestData['token']);
      $payment = Payment::where('user_id', $user_id)->first();
      
      return response()->json($payment, $this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function saveMobileTransfar(Request $request){
    try {
      $requestData = $request->all();
      $user_id = base64_decode($requestData['token']);
      $payment = Payment::where('user_id', $user_id)->first();
      $payment->update($requestData);
      return response()->json($payment, $this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function saveUpi(Request $request){
    try {
      $requestData = $request->all();
      $user_id = base64_decode($requestData['token']);
      $payment = Payment::where('user_id', $user_id)->first();
      $payment->update($requestData);
      return response()->json($payment, $this->_statusOK);
    } catch(\Illuminate\Database\QueryException $e){
      return response()->json(['error' => $e->errorInfo[2]], 401);
    }
  }

  public function random_strings($length_of_string)
    {
    
        // String of all alphanumeric character
        $str_result = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
    
        // Shuffle the $str_result and returns substring
        // of specified length
        return substr(str_shuffle($str_result),
                        0, $length_of_string);
    }

}