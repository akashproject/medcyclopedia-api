<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Contact;

class ContactController extends Controller
{
    public $_statusOK = 200;
    public $_statusErr = 500;
    public function saveContact(Request $request){
        try {
            $data = $request->all();
            $contact = Contact::create($data);
            return response()->json(true,$this->_statusOK);
        } catch(\Illuminate\Database\QueryException $e){

        }

    }
}
