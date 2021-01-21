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
}