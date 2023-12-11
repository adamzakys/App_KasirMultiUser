<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    //
    function index(){
        return view('admin');
    }
    function owner(){
        return view('layouts.app');
    }
    function kasir(){
        return view('layouts.app');
    }
}
