<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;

class CategoryProductController extends Controller
{
    public function add_category(){
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
        $data = DB::table('category')->get();
        return view('admin.all_category',['data' => $data]);
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
}
