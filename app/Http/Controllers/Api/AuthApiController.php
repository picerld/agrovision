<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AuthApiController extends Controller
{
    public function login()
    {
        return response()->json([
            'message' => 'Login successfully'
        ]);
    }
}