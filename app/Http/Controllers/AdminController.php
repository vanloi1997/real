<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Session;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
class AdminController extends Controller
{
    public function AuthLogin(){
        $id = Session::get('id');
        if($id){
            return Redirect('dashboard');
        }else{
            return Redirect('login')->send();
        }
    }
    public function index(){
        return view('admin_login');
    }
    public function show_dashboard(){
        $this->AuthLogin();
        return view('admin.dashboard');
    }
    public function login(Request $req){
        $email = $req->email;
        $password = md5($req->password);

        $data = DB::table('admin')->where('email',$email)->where('password',$password)->first();
        if($data){
            Session::put('name',$data->name);
            Session::put('id',$data->id);
            return Redirect('/dashboard');
        }else{
            Session::put('message','Mật khẩu hoặc tài khoản nhập sai. Vui lòng nhập lại!!!');
            return Redirect('/login');
        }
    }
    public function logout(){
        $this->AuthLogin();
        Session::put('name',null);
        Session::put('id',null);    
        return Redirect('/login');
    }
}
