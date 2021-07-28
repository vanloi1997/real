<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect('dashboard');
        }else{
            return Redirect('login')->send();
        }
    }
    public function add_product(){
        $this->AuthLogin();
        $cate = DB::table('category')->orderby('id' , 'desc')->get();
        $brand = DB::table('brand')->orderby('id' , 'desc')->get();
        return view('admin.add_product',['cate' => $cate , 'brand' => $brand]);
    }
    public function save_product(Request $req){
        $data = array();
        $data['name'] = $req->product_name;
        $data['price'] = $req->product_price;
        $data['desc'] = $req->product_desc;
        $data['content'] = $req->product_content;
        $data['category_id'] = $req->product_category;
        $data['brand_id'] = $req->product_brand;
        $data['status'] = $req->product_status;
        $data['image'] = $req->product_image;
        $get_image = $req->file('product_image');
        
        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/product', $new_image);
            $data['image'] = $new_image;
            DB::table('product')->insert($data);
            Session::put('message','Thêm sản phẩm thành công');
            return Redirect('/add-product');
        }
        $data['image'] = '';
        DB::table('product')->insert($data);
        Session::put('message','Thêm sản phẩm thành công');
        return Redirect('/add-product');
    }
    public function all_product(){
        $this->AuthLogin();
        $data = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')
        ->join('brand', 'product.brand_id', '=', 'brand.id')
        ->select('product.*', 'category.name as category_name' , 'brand.name as brand_name')
        ->get();
        return view('admin.all_product',['data' => $data]);
    }
    public function edit_product($id){
        $this->AuthLogin();
        $data = DB::table('product')->where('id',$id)->get();  
        $cate = DB::table('category')->get(); 
        $brand = DB::table('brand')->get();   
        return view('admin.edit_product',['data' => $data, 'cate' => $cate, 'brand' => $brand]);
    }
    public function update_product(Request $req , $id){
        $data = array();
        $data['name'] = $req->product_name;
        $data['price'] = $req->product_price;
        $data['desc'] = $req->product_desc;
        $data['content'] = $req->product_content;
        $data['category_id'] = $req->product_category;
        $data['brand_id'] = $req->product_brand;
        $data['status'] = $req->product_status;
        $get_image = $req->file('product_image');
        
        if($get_image){
            $get_name_image =$get_image->getClientOriginalName();
            $name_image = current(explode('.',$get_name_image));
            $new_image = $name_image.rand(0,99).'.'.$get_image->getClientOriginalExtension();
            $get_image -> move('uploads/product', $new_image);
            $data['image'] = $new_image;
            DB::table('product')->where('id',$id)->update($data);
            Session::put('message','Sửa sản phẩm thành công');
            return Redirect('/all-product');
        }
        $data['image'] = '';
        DB::table('product')->where('id',$id)->update($data);
        Session::put('message','Sửa sản phẩm thành công');
        return Redirect('/all-product');
    }
    public function delete_product($id){
        $this->AuthLogin();
        $data = DB::table('product')->where('id',$id)->delete();  
        Session::put('message','Xóa sản phẩm thành công');
        return Redirect('/all-product');
    }
    public function unactive_product($id){
        DB::table('product')->where('id',$id)->update(['status' => 1]);
        Session::put('message','Đã ẩn');
        return Redirect('/all-product');
    }
    public function active_product($id){
        DB::table('product')->where('id',$id)->update(['status' => 0]);
        Session::put('message','Đã hiện');
        return Redirect('/all-product');
    }
    public function details_product($id){
        $cate  = DB::table('category')->where('status','0')->get();
        $brand  = DB::table('brand')->where('status','0')->get();
        $data = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')
        ->join('brand', 'product.brand_id', '=', 'brand.id')
        ->select('product.*', 'category.name as category_name' , 'brand.name as brand_name')
        ->where('product.id',$id)
        ->get();
        foreach($data as $val){
            $category = $val->category_id;
        }

        $related = DB::table('product')->join('category', 'product.category_id', '=', 'category.id')
        ->join('brand', 'product.brand_id', '=', 'brand.id')
        ->where('product.category_id',$category)
        ->whereNotIn('product.id',[$id])
        ->select('product.*')
        ->get();
        return view('pages.product.detail_product',['cate' => $cate, 'brand' => $brand , 'data' => $data ,'related' => $related]);
    }
}
