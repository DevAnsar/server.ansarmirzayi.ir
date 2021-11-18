<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function home(){
        return view('welcome');
    }
}
