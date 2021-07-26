<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class BrandController extends Controller
{
    
    public function add_brand(){
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
