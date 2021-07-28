<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use Cart;
class CartController extends Controller
{
    public function save_cart(Request $req){
        $productID = $req->productid_hidden;
        $quati = $req->qty;
        $cate  = DB::table('category')->where('status','0')->get();
        $brand  = DB::table('brand')->where('status','0')->get();
        $product_info = DB::table('product')->where('id',$productID)->first();
        
        $data['id'] = $product_info->id;
        return view('pages.cart.show_cart',['cate' => $cate, 'brand' => $brand]);
    }
}
