<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Image;
use App\Models\Category;
use App\Models\Brand;
use App\Models\Product;

class ProductController extends Controller
{
    public function getListProduct(){
        return view('frontend.product');
    }
    public function getList(){
        $data = Product::all();
        return view('backend.product.list',['data' => $data]);
    }
    public function getAdd(){
        $cate = Category::all();
        $brand = Brand::all();
        return view('backend.product.add_edit',['cate' => $cate, 'brand' => $brand]);
    }
    public function postAdd(Request $req){
        $req->validate([
            'product_desc'       => 'max:2000',
            'product_promotion'  =>  'lt:product_price',
            'product_image'      =>  'mimes:jpeg,jpg,png'
        ],
        [
            'max'                => 'Trường tối đa :max kí tự',
            'lt'                 => 'Gía ưu đãi phải nhỏ hơn giá thị trường',
            'mimes'              => 'Ảnh định dạng jpeg,jpg,png'
        ]);
        $product = new Product();
        $product->name = $req->product_name;
        $product->category_id = $req->product_category;
        $product->brand_id = $req->product_brand;
        $product->price = $req->product_price;
        $product->promotion_price = $req->product_promotion;
        $product->description = $req->product_desc;
        $product->enabled = $req->product_status;
        $product->quantity_in_stock = $req->product_amount;
        $product->views = 0;
        $product->save();
        dd($product);
        return back()->with(['typeMsg'=>'success','msg'=>'Thêm thành công']);
    }
}
