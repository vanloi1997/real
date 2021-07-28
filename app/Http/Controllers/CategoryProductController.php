<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class CategoryProductController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect('dashboard');
        }else{
            return Redirect('login')->send();
        }
    }
    public function add_category(){
        $this->AuthLogin();
        return view('admin.add_category');
    }
    public function save_category(Request $req){
        $data = array();
        $data['name'] = $req->category_name;
        $data['desc'] = $req->category_desc;
        $data['status'] = $req->category_status;

        DB::table('category')->insert($data);
        Session::put('message','Thêm danh mục thành công');
        return Redirect('/add-category');
    }
    public function all_category(){
        $this->AuthLogin();
        $data = DB::table('category')->get();
        return view('admin.all_category',['data' => $data]);
    }
    public function edit_category($id){
        $this->AuthLogin();
        $data = DB::table('category')->where('id',$id)->get();  
        return view('admin.edit_category',['data' => $data]);
    }
    public function update_category(Request $req , $id){
        $data = array();
        $data['name'] = $req->category_name;
        $data['desc'] = $req->category_desc;
        DB::table('category')->where('id',$id)->update($data);
        Session::put('message','Sửa danh mục thành công');
        return Redirect('/all-category');
    }
    public function delete_category($id){
        $this->AuthLogin();
        $data = DB::table('category')->where('id',$id)->delete();  
        Session::put('message','Xóa danh mục thành công');
        return Redirect('/all-category');
    }
    public function unactive_category($id){
        DB::table('category')->where('id',$id)->update(['status' => 1]);
        Session::put('message','Đã ẩn');
        return Redirect('/all-category');
    }
    public function active_category($id){
        DB::table('category')->where('id',$id)->update(['status' => 0]);
        Session::put('message','Đã hiện');
        return Redirect('/all-category');
    }

    public function show_category_home($id){
        $cate  = DB::table('category')->where('status','0')->get();
        $brand  = DB::table('brand')->where('status','0')->get();
        $cate_by_id  = DB::table('product')->join('category','product.category_id','=','category.id')->where('category.id',$id)->select('product.*')->get();
        $cate_name = DB::table('category')->where('id',$id)->get();
        return view('pages.category.home_category',['cate' => $cate, 'brand' => $brand, 'cate_by_id' => $cate_by_id, 'cate_name' => $cate_name]);
    }
}
