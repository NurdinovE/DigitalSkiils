<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CaptureController extends Controller
{
    public function capture()
    {
        return response()->json(['captcha'=> captcha_img()]);
    }
}
