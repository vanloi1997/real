<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function index(){
        $cate  = DB::table('category')->where('status','0')->get();
        $brand  = DB::table('brand')->where('status','0')->get();
        $product  = DB::table('product')->where('status','0')->orderBy('created_at','desc')->get();
        return view('pages.home',['cate' => $cate, 'brand' => $brand, 'product' => $product]);
    }
}
