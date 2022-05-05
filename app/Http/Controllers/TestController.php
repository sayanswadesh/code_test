<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestController extends Controller
{
    public function home()
    {
        return view('welcome');
    }
    public function get_date(Request $request)
    {
        try {
            return response()->json(['data'=>$request->all(),'status'=>'success']);
        }catch (\Exception $exception){
            return response()->json(['msg'=>$exception->getMessage(),'status'=>'error']);
        }
    }
}
