<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Categories;
use App\Models\Brand;
use App\Models\Product;

class CommonController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function categories(){
        try {
            $categories = Categories::all();
            return response()->json($categories,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            
        }
    }

    public function brands($id){
        try {           
            $brands = Brand::where('category_id', 'like', '%"' . $id . '"%')->orderBy('name', 'asc')->get();
            return response()->json($brands,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            
        }
    }

    public function topBrands(){
        try {           
            $tobSellingBrands = Brand::inRandomOrder()->limit(10)->get();
            return response()->json($tobSellingBrands,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            
        }
        
    }

    public function updateSlug(){
        try {           
            $products = Brand::all();
            $array = array();
            foreach ($products as $key => $product) {
                $array['slug'] = "sell-old-used-".str_replace(" ","-",strtolower($product->name));
                $newProduct = Brand::find($product->id);
                $newProduct->update($array);
            }

            echo exit;
        } catch(\Illuminate\Database\QueryException $e){
            
        }
        
    }

    public function versionUpdate(){
        try {  
            return false;    
        } catch(\Illuminate\Database\QueryException $e){
        
        }

    }



}
