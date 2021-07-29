<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller
{
    public function getListProduct(){
        return view('frontend.product');
    }
}
