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
        $product_info = DB::table('product')->where('id',$productID)->first();
        
        $data['id'] = $product_info->id;
        $data['qty'] = $quati;
        $data['name'] = $product_info->name;
        $data['price'] = $product_info->price;
        $data['weight'] = $product_info->price;
        $data['options']['image'] = $product_info->image;
        Cart::add($data);
        return Redirect('/show-cart');
    }
    public function show_cart(){
        $cate  = DB::table('category')->where('status','0')->get();
        $brand  = DB::table('brand')->where('status','0')->get();
        return view('pages.cart.show_cart',['cate' => $cate, 'brand' => $brand]);
    }
    public function delete_cart($id){
        Cart::remove($id);
        return Redirect('/show-cart');
    }
}
