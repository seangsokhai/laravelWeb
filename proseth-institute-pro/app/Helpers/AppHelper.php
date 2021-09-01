<?php 


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use App\Setting;
use App\MainCategory;
use App\SubCategory;

function uploadImage($requestFile, $path)
{

    $format = $requestFile->getClientOriginalExtension();
    $img = Image::make($requestFile)->encode($format, 50);
    $imgPath = 'images/'.$path .'/'. uniqid() . '.'.$format;
    $img->save($imgPath, 50);

    return $imgPath;
}


function setting()
{
	$setting = Setting::first();
	return $setting;
}

function mainCategory()
{
	$mainCategory = MainCategory::get();
	return $mainCategory;
}

function subCategory()
{
	$subCategory = SubCategory::get();
	return $subCategory;
}


?>
