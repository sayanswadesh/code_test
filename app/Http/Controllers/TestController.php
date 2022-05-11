<?php

namespace App\Http\Controllers;

use App\Models\Image;
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

    public function image_upload(Request $request)
    {
        $images = Image::first();
        if (!empty($images)){
            $images = json_decode($images['image'],true);
        }
        return view('image',compact('images'));
    }
    public function uploads(Request $request)
    {
        $images = $request->image;
        $uploadImages = [];
        if (!empty($images)){
            foreach ($images as $image) {
                $name = \App\helper\Image::addImage($image);
                $uploadImages[] = $name;
            }
            $update = Image::first();
            if (empty($update)){
                $update = new Image();
            }
            $update->image = json_encode($uploadImages);
            $update->save();
            return redirect()->back()->with('message','Image Uploaded Successfylly!!!');
        }else{
            return redirect()->back()->with('message','Please Choose Image!!!');
        }
    }
}
