<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Categories;
use App\Models\Series;
use App\Models\User;
use App\Models\VehicleVariation;
use App\Models\Order;
use App\Models\City;
use App\Models\Accessories;
use App\Models\Condition;
use App\Models\Address;
use Mail;


class VehicleController extends Controller
{

    public $loggedinUser = '';
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function getVahicleVariation(){
        try {

            $vahicleVariation = array();
           
            $vahicleVariation['year'] = VehicleVariation::where('type', "year")->get();
            $vahicleVariation['km'] = VehicleVariation::where('type', "km")->get();
            $vahicleVariation['city'] = City::orderBy('name')->get();

           // $series = Series::find($vehicle->series_id);
           return response()->json($vahicleVariation,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], 401);
        }
    }

    public function givenDocuments(Request $request){
        $user = $this->userdata;
        $data = $request->all();
        $category_id = $request->session()->get('selling_category');
        $vehicleData = array(
            'vehicle_id' => $data['vehicle_id'],
            'variation_type' => "Year :".$data['year'].' | Kilometer Driven :'.$data['kmdriven'].' | Registration City :'.$data['city']
        );
        $request->session()->put('vehicleData', $vehicleData);

        $product = Product::find($data['vehicle_id']);
        $accessories = Accessories::where('category_id', $category_id)->get();
        $veriationType = $vehicleData["variation_type"];

        $tobSellingBrands = Brand::where('category_id', 'like', '%"' . $category_id . '"%')->inRandomOrder()->limit(10)->get();
        $tobSellingProducts = Product::where('category_id', 'like', '%"' . $category_id . '"%')->inRandomOrder()->limit(10)->get();

        return view('vehicle.valid-document',compact('accessories','product','user','tobSellingBrands','tobSellingProducts','veriationType'));
    }

    // public function vehicleCondition(Request $request){
    //     $user = $this->userdata;
    //     $vehicleData = $request->session()->get('vehicleData');
    //     $data = $request->all();
    //     if (isset($data['accessories'])) {
    //         $vehicleData['accessories'] = $data['accessories'];
    //     } 
        
    //     $category_id = $request->session()->get('selling_category');
    //     $request->session()->put('vehicleData', $vehicleData);
        
    //     $product = Product::find($vehicleData['vehicle_id']);
    //     $conditions = Condition::where('category_id', $category_id)->get();
    //     $veriationType = $vehicleData['variation_type'];

    //     $tobSellingBrands = Brand::inRandomOrder()->limit(10)->get();
    //     $tobSellingProducts = Product::inRandomOrder()->limit(10)->get();

    //     return view('vehicle.vahicle-condition',compact('conditions','product','user','tobSellingBrands','tobSellingProducts','veriationType'));
    // }

    // public function bookAppointment(Request $request){
        
    //     $user = $this->loggedinUser;
    //     $data = $request->all();
    //     $vehicleData = $request->session()->get('vehicleData');
    //     $vehicleData['condition_id'] = $data['condition_id'];        
    //     $request->session()->put('vehicleData', $vehicleData);

        
    //     $product = Product::find($vehicleData['vehicle_id']);
    //     return view('vehicle.book-appointment',compact('product','vehicleData','user'));
        
    // }

    public function confirmBooking(Request $request) {
        try {
            $data = $request->all();
            $device_condition = array(
                'accessories' => (isset($data['accessories']))?$data['accessories']:'',
                'condition_id' => $data['condition_id']
            );
            $address = Address::findOrFail($data['address_id']);
            $orderData = array(
                'user_id' => base64_decode($data['token']),
                'product_id' => $data['product_id'],
                'variation_type' => $data['variation_type'],
                'device_condition' => json_encode($device_condition),
                'service_no' => rand(00000000,99999999),
                'amount' => "0.00",
                'payment_mode' => $data['payment_mode'],
                'pickup_schedule' => $data['pickup_schedule'],
                'pickup_address' => $address->address_1,
                'pickup_city' => $address->city,
                'pickup_state' => $address->state,
                'pincode' => $address->pincode,
                'status' => 'pending',
            );

            $order = Order::create($orderData)->toArray();

            // Mail::send('emails.order', $orderData, function ($m) use ($user) {
            //     $m->from('service@bikriworld.com', 'Bikriworld');
            //     $m->to($user->email, $user->name)->subject('Bikriworld Booking Appointment Placed Successfully!');
            // });

            // Mail::send('emails.order', $orderData, function ($m) use ($user) {
            //     $m->from('admin@bikriworld.com', 'Bikriworld');
            //     $m->to('pramod.kr.14855@gmail.com', $user->name)->subject('Bikriworld Got new Booking Request!');
            // });

            return response()->json($order,$this->_statusOK);

        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], 401);
        }
    }
}
