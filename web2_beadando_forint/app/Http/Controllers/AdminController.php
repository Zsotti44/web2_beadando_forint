<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function __construct(){}

    public function index(){

        return view('admin.index');
    }
    public function menuk(){

        return view('admin.menuk');
    }
}
