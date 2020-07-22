<?php

namespace App\Http\Controllers\Website;

use ByteDigital123\StoreFileContentService\StoreFileContent;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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
