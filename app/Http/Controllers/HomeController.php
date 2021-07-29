<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class HomeController extends Controller
{
    public function getIndex(){
        // $cate  = DB::table('category')->where('status','0')->get();
        // $brand  = DB::table('brand')->where('status','0')->get();
        // $product  = DB::table('product')->where('status','0')->orderBy('created_at','desc')->get();
        return view('frontend.home');
    }
    public function getAdminPage(){
        return view('backend.master');
    }
}
