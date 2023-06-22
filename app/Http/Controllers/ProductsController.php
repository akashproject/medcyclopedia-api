<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\User;
use App\Models\Order;
use App\Models\Brand;
use App\Models\Categories;
use App\Models\Question;
use App\Models\Accessories;
use App\Models\Age;
use App\Models\Condition;
use App\Models\SellRequest;
use App\Models\DeviceConfig;
use App\Models\Series;
use App\Models\ProductConfigPrice;
use App\Models\Address;
use Mail;

class ProductsController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function listProduct(Request $request){
        try {

            $page = ($request->has('page'))?$request->input('page'):'1';
            $items_per_page = 18;
            $offset = ($page - 1) * $items_per_page;
            $requestData = $request->all();
            $products = Product::where('brand_id', $requestData['brand_id'])
            ->where('category_id', $requestData['category_id'])
            ->orderBy('name', 'asc')
            ->limit($items_per_page)
            ->offset($offset)
            ->get();

            return response()->json($products,$this->_statusOK);

            // if($requestData['category_id'] == "12"){
                
            //     //return view('vehicle.index',compact('products','brand','user','tobSellingBrands','tobSellingProducts'));
            // } else {
            //     return response()->json($products,$this->_statusOK);
            //     //return view('product.index',compact('products','brand','user','tobSellingBrands','tobSellingProducts'));
            // }
            
            } catch(\Illuminate\Database\QueryException $e){
        }
    }

    public function searchProduct(){
        try {
            $products = Product::where('brand_id', $requestData['brand_id'])
            ->where('category_id', $requestData['category_id'])
            ->orderBy('name', 'asc')
            ->get();

            return response()->json($products,$this->_statusOK);
            
            } catch(\Illuminate\Database\QueryException $e){
        }
    }

    public function viewProduct($id){
        $product = Product::find($id);
        return response()->json($product,$this->_statusOK);
    }

    public function getDeviceConfiguration($brand_id){
        try {
            $device_condition = array();
            $year = '';
            if($brand_id == "1"){
                $device_condition['processer'] = DeviceConfig::where('type', "processer")->where('brand_id', $brand_id)->orderBy('value', 'asc')->get();
                $device_condition['year'] = DeviceConfig::where('type', "year")->orderBy('value', 'asc')->get();
            } else {
                $device_condition['processer'] = DeviceConfig::where('type', "processer")->whereNull('brand_id')->orderBy('value', 'asc')->get();
            }

            $device_condition['ram'] = DeviceConfig::where('type', "ram")->orderBy('id', 'asc')->get();
            $device_condition['hdd'] = DeviceConfig::where('type', "hdd")->orderBy('id', 'asc')->get();
            $device_condition['screen'] = DeviceConfig::where('type', "screen")->orderBy('value', 'asc')->get();
            $device_condition['graphic'] = DeviceConfig::where('type', "graphic")->orderBy('value', 'asc')->get();

            return response()->json($device_condition,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], 401);
        }
    }

    public function setDevicePrice(Request $request) {
        $productData = $request->all();
        $veriationPrice = 0;
        try {
            // Device Configuration Price
            $configPrice = DeviceConfig::select('price')
            ->whereIn('id', $productData['config'])
            ->get(); 

            foreach($configPrice as $key => $value){
                $veriationPrice += $value->price;
            }

            // Device Configuration Extra Price
            $productConfigPrice = ProductConfigPrice::select('price')
            ->where('product_id', '=', $productData['product_id'])
            ->whereIn('config_id', $productData['config'])
            ->get(); 
            foreach($productConfigPrice as $key => $value){
                $veriationPrice += $value->price;
            }
            
            return response()->json($veriationPrice,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], 401);
        }
    }
    

    public function placeOrder(Request $request) {
        $data = $request->all();
        try {
            $device_condition = array(
                'question_id' => json_decode($data['question_id']),
                'accessories' => (json_decode(isset($data['accessories'])))?json_decode($data['accessories']):'',
                'age_id' => $data['age_id'],
                'condition_id' => $data['condition_id'],
            );
            $address = DB::table('addresses')->where("id",$data['address_id'])->first();
            $product = DB::table('product')->where("id",$data['product_id'])->first();
            $orderData = array(
                'user_id' => base64_decode($data['token']),
                'product_id' => $data['product_id'],
                'device_name' => isset($product->name)?$product->name:"",
                'variation_type' => $data['variation_type'],
                'device_condition' => json_encode($device_condition),
                'service_no' => rand(00000000,99999999),
                'amount' => $data['amount'],
                'payment_mode' => $data['payment_mode'],
                'pickup_schedule' => $data['pickup_schedule'],
                'pickup_address' => isset($address->address_1)?$address->address_1:"",
                'pickup_city' => isset($address->city)?$address->city:"",
                'pickup_state' => isset($address->state)?$address->state:"",
                'pincode' => isset($address->pincode)?$address->pincode:"",
                'status' => 'pending',
            );


            $order = Order::create($orderData)->toArray();

            $age = array();
        if (isset($device_condition['age_id'])) {
            $age = Age::findOrFail($device_condition['age_id'])->toArray();
        }

        $condition = array();
        if (isset($device_condition['condition_id'])) {
            $condition = Condition::findOrFail($device_condition['condition_id'])->toArray();
        }
        
        $accessories = array();
        if(isset($device_condition['accessories']) && $device_condition['accessories'] != ""){
            $accessories = Accessories::whereIn('id', $device_condition['accessories'])->get()->toArray();
        }
        
        $orderData['questions'] = array();
        if(isset($device_condition['question_id'])){
            $i = 0;
            foreach ($device_condition['question_id'] as $key => $value) {
                $question = DB::table('calculation_question')
                ->where('calculation_question.id', '=', $key)
                ->select('calculation_question.question')->first();
                if(isset($question)){
                    $orderData['questions'][$i] = $question->question;
                }
                $i++;
            }
        }

        $orderData['age'] = $age['age'];
        $orderData['condition'] = $condition['condition'];
        $orderData['accessories'] = $accessories;

        $user = User::find(base64_decode($data['token']));
        if (isset($user->email)) {
            Mail::send('emails.order', $orderData, function ($m) use ($user) {
                $m->from('service@bikriworld.com', 'Bikriworld');
                $m->to($user->email, $user->name)->subject('Bikriworld Order Placed Successfully!');
            });
    
            Mail::send('emails.order', $orderData, function ($m) use ($user) {
                $m->from('service@bikriworld.com', 'Bikriworld');
                $m->to('pramod.kr.14855@gmail.com', "Admin User")->subject('Bikriworld Got new Order Request From - '.$user->mobile);
            });
        }
            return response()->json($order,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], 401);
        }
       
    }

}