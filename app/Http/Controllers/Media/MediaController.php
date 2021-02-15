<?php

namespace App\Http\Controllers\Media;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Response;

class MediaController extends Controller
{
    public function getBanner($bannerName)
    {
        $path = storage_path('app/public/images/banner/' . $bannerName);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", 'image');
        return $response;
    }

    public function getProductImage($productImage)
    {
        $path = storage_path('app/public/images/products/' . $productImage);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", 'image');
        return $response;
    }

    public function getGenuinePartImage($productImage)
    {
        $path = storage_path('app/public/images/honda/genuine_parts/' . $productImage);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", 'image');
        return $response;
    }

    public function getApparelImage($productImage)
    {
        $path = storage_path('app/public/images/honda/apparels/' . $productImage);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", 'image');
        return $response;
    }

    public function getAccessoryImage($productImage)
    {
        $path = storage_path('app/public/images/honda/accessories/' . $productImage);
        if (!File::exists($path)) {
            abort(404);
        }

        $file = File::get($path);
        $response = Response::make($file, 200);
        $response->header("Content-Type", 'image');
        return $response;
    }
}