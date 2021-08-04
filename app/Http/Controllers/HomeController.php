<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
class HomeController extends Controller
{
    public function getIndex(){
        // $cate  = DB::table('category')->where('status','0')->get();
        // $brand  = DB::table('brand')->where('status','0')->get();
        $product  = Product::all();
        return view('frontend.home',['product' => $product]);
    }
    public function getAdminPage(){
        return view('backend.master');
    }
}
