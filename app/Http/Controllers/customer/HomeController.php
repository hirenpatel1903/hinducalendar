<?php

namespace App\Http\Controllers\customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function register(Request $request)
    {
        // register 

        dd($request->toArray());
    }

    public function login(Request $request)
    {
        // login 

        dd($request->toArray());
    }
}
