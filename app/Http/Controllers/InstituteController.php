<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Institute;

class InstituteController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function list(Request $request){
        try {
            $instituteData = Institute::where('state_id', $request->state_id)->where('course_id', $request->course_id)->get();
        
            return response()->json($instituteData,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], $this->_statusErr);
        }
        
    }


    public function show($id)
    {
        try {
            return response()->json(Institute::find($id),$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], $this->_statusErr);
        }
        
    }
}
