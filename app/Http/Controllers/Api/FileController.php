<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use ByteDigital123\StoreFileContentService\StoreFileContent;

class FileController extends Controller
{

    public function __construct()
    {
        //
    }

    public function createFile(Request $request)
    {
        $attributes = $request->all();

        return (new StoreFileContent())->handle($attributes['file']);
    }

}
