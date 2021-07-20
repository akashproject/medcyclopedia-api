<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Exam;

class ExamController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;
    
    public function getExams($id) {
        try {
          $exams = DB::table('exams')
            ->join('courses', 'courses.id', '=', 'exams.course_id')
            ->where('exams.course_id', '=', $id)
            ->select('exams.*', 'courses.course_name')
            ->distinct()
            ->get();
          return response()->json($exams, 200);
        } catch(\Illuminate\Database\QueryException $e){
          return response()->json(['error' => $e->errorInfo[2]], 401);
        }
    }

    public function viewExam($id) {
        try {
            return response()->json(Exam::find($id),$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
            return response()->json(['error' => $e->errorInfo[2]], $this->_statusErr);
        }
    }
}
