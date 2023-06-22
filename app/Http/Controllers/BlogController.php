<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    //
    public $_statusOK = 200;
    public $_statusErr = 500;

    public function index(Request $request){
        try {
            $blogs = Blog::all();
            return response()->json($blogs, $this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){
        return response()->json(['error' => $e->errorInfo[2]], 401);
        }
    }
}
