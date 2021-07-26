<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class ProductController extends Controller
{
    public function add_product(){
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
        $get_image = $req->file('image');
        
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
    public function all_brand(){
        $data = DB::table('brand')->get();
        return view('admin.all_brand',['data' => $data]);
    }
    public function edit_brand($id){
        $data = DB::table('brand')->where('id',$id)->get();  
        return view('admin.edit_brand',['data' => $data]);
    }
    public function update_brand(Request $req , $id){
        $data = array();
        $data['name'] = $req->brand_name;
        $data['desc'] = $req->brand_desc;
        DB::table('brand')->where('id',$id)->update($data);
        Session::put('message','Sửa thương hiệu thành công');
        return Redirect('/all-brand');
    }
    public function delete_brand($id){
        $data = DB::table('brand')->where('id',$id)->delete();  
        Session::put('message','Xóa thương hiệu thành công');
        return Redirect('/all-brand');
    }
    public function unactive_brand($id){
        DB::table('brand')->where('id',$id)->update(['status' => 1]);
        Session::put('message','Đã ẩn');
        return Redirect('/all-brand');
    }
    public function active_brand($id){
        DB::table('brand')->where('id',$id)->update(['status' => 0]);
        Session::put('message','Đã hiện');
        return Redirect('/all-brand');
    }
}
