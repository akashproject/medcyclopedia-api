<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Institute;
use App\Models\InstituteCourses;
use App\Models\State;
use App\Models\Course;

class InstituteController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function list(Request $request){
        try {
            //$instituteData = Institute::where('state_id', $request->state_id)->where('ownership_type', $request->ownership_type)->get();
            $instituteData = DB::table('institutes')
            ->join('institute_course', 'institutes.id', '=', 'institute_course.institute_id')
            ->where('institute_course.course_id', '=', $request->course_id)
            ->where('state_id', '=', $request->state_id)
            ->where('ownership_type', '=', $request->ownership_type)
            ->select('institutes.*')
            ->distinct()
            ->get();
        
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

    public function instituteCourses($id)
    {
        try {
            $course = InstituteCourses::where('institute_id', $id)->get();
            return response()->json($course,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], $this->_statusErr);
        }
        
    }

    public function courses()
    {
        try {
            $course = Course::all();
            return response()->json($course,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], $this->_statusErr);
        }
        
    }


    public function states()
    {
        try {
            $state = State::all();
            return response()->json($state,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], $this->_statusErr);
        }
        
    }

}
