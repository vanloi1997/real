<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
class AccountController extends Controller
{
    public function getLoginAdmin(){
        return view('backend.login');
    }
    public function postLoginAdmin(Request $req){
        $req -> validate([
            'stringUser' => 'exists:account,username'
        ],
        [
            'exists'   => 'Tài khoản này không tồn tại yêu cầu bạn đăng nhập lại'
        ]);
        $data = [
            'username' => $req->stringUser,
            'password' => $req->stringPass,
            'role'     => 'admin',
        ];
        $remember = ($req->remember) ? true : false;
        if(Auth::guard('account_admin')->attempt($data , $remember)){
            return redirect(url('/admin-page'))->with(['typeMsg' => 'success' ,'msg' => 'Đăng Nhập Thành Công']);
        }
        else return back()->with(['typeMsg' => 'danger' ,'msg' => 'Tên tài khoản/mật khẩu không chính xác!']);
    }
    public function getLogoutAdmin(){
        Auth::guard('account_admin')->logout();
        return redirect(url('/admin-page/login'))->with(['typeMsg'=>'success','msg'=>'Đăng xuất thành công']);
    }
}
