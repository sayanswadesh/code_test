<?php


namespace App\helper;


class Image
{
    public static function addImage($image)
    {
        $name=rand(0,99999).'.'.$image->getClientOriginalExtension();
        $image->move(public_path('/upload/'),$name);
        return $name;
    }
}
