<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;


class BrandController extends Controller
{
    public function getList(){
        $data = Brand::all();
        return view('backend.brand.list' , ['data' => $data]);
    }
    public function getAdd(){
        return view('backend.brand.add_edit');
    }
    public function postAdd(Request $req){
        $req->validate([
            'name_brand' => 'required|unique:brand,name'
        ],[
            'required'       => 'Không được để trống!',
            'unique'        => 'Tên thương hiệu đã tồn tại'      
        ]);
        $brand = new Brand();
        $brand->name = $req->name_brand;
        $brand->save();
        return back()->with(['typeMsg'=>'success','msg' => 'Thêm thành công!']);
    }
    public function getEdit($id){
        $brand = Brand::find($id);
        return view('backend.brand.add_edit',['brand' => $brand]);
    }
    public function postEdit(Request $req, $id){
        $req->validate([
            'name_brand'   => 'required|unique:brand,name'
        ],[
            'required'       => 'Không được để trống!',
            'unique'        => 'Tên thương hiệu đã tồn tại'      
        ]);
        $brand = Brand::find($id);
        $brand->name = $req->name_brand;
        $brand->save();
        return back()->with(['typeMsg'=>'success','msg' => 'Sửa thành công!']);
    }
    public function getDelete($id){
    	Brand::destroy($id);
    	return redirect(url('/admin-page/brand/list'))->with(['typeMsg'=>'success','msg'=>'Xóa thành công']);
    }
}
