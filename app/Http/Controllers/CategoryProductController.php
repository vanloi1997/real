<?php

namespace App\Http\Controllers;
use App\Models\Category;
use Illuminate\Http\Request;
use DB;
use Session;

class CategoryProductController extends Controller
{
    public function getList(){
        $data = Category::all();
        return view('backend.category.list' , ['data' => $data]);
    }
    public function getAdd(){
        return view('backend.category.add_edit');
    }
    public function postAdd(Request $req){
        $req->validate([
            'name_category' => 'required|unique:category,name'
        ],[
            'require'       => 'Không được để trống!',
            'unique'        => 'Tên danh mục đã tồn tại'      
        ]);
        $category = new Category();
        $category->name = $req->name_category;
        $category->save();
        return back()->with(['typeMsg'=>'success','msg' => 'Thêm thành công!']);
    }
    public function getEdit($id){
        $category = Category::find($id);
        return view('backend.category.add_edit',['category' => $category]);
    }
    public function postEdit(Request $req, $id){
        $req->validate([
            'name_category'   => 'required|unique:category,name'
        ],[
            'require'       => 'Không được để trống!',
            'unique'        => 'Tên danh mục đã tồn tại'      
        ]);
        $category = Category::find($id);
        $category->name = $req->name_category;
        $category->save();
        return back()->with(['typeMsg'=>'success','msg' => 'Sửa thành công!']);
    }
    public function getDelete($id){
    	Category::destroy($id);
    	return redirect(url('/admin-page/category/list'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
