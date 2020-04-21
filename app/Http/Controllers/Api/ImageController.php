<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Services\ImageFileService;
use App\Http\Controllers\Controller;

class ImageController extends Controller
{

    public function __construct()
    {
        //
    }

    public function createFile(Request $request)
    {
        $attributes = $request->all();
        return (new ImageFileService($attributes['file']))->handle();
    }

}
