<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BrandController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect('dashboard');
        }else{
            return Redirect('login')->send();
        }
    }
    public function add_brand(){
        $this->AuthLogin();
        return view('admin.add_brand');
    }
    public function save_brand(Request $req){
        $data = array();
        $data['name'] = $req->brand_name;
        $data['desc'] = $req->brand_desc;
        $data['status'] = $req->brand_status;

        DB::table('brand')->insert($data);
        Session::put('message','Thêm thương hiệu thành công');
        return Redirect('/add-brand');
    }
    public function all_brand(){
        $this->AuthLogin();
        $data = DB::table('brand')->get();
        return view('admin.all_brand',['data' => $data]);
    }
    public function edit_brand($id){
        $this->AuthLogin();
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
        $this->AuthLogin();
        $data = DB::table('brand')->where('id',$id)->delete();  
        Session::put('message','Xóa thương hiệu thành công');
        return Redirect('/all-brand');
    }
    public function unactive_brand($id){
        $this->AuthLogin();
        DB::table('brand')->where('id',$id)->update(['status' => 1]);
        Session::put('message','Đã ẩn');
        return Redirect('/all-brand');
    }
    public function active_brand($id){
        $this->AuthLogin();
        DB::table('brand')->where('id',$id)->update(['status' => 0]);
        Session::put('message','Đã hiện');
        return Redirect('/all-brand');
    }
    public function show_brand_home($id){
        $cate  = DB::table('category')->where('status','0')->get();
        $brand  = DB::table('brand')->where('status','0')->get();
        $brand_by_id  = DB::table('product')->join('brand','product.brand_id','=','brand.id')->where('brand.id',$id)->get();
        return view('pages.brand.home_brand',['cate' => $cate, 'brand' => $brand, 'brand_by_id' => $brand_by_id]);
    }
}
