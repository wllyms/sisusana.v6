<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use function PHPUnit\Framework\isNull;

class AdminController extends Controller
{
    function index()
    {

        // // var_dump(Auth::user());
        // if (is_null(Auth::user())) {
        //     return redirect()->to('/');
        // } else {
        //     return view('beranda');
        // }
    }
}