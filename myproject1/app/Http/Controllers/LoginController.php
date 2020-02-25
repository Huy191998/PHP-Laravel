<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\customers;

use Session;

class LoginController extends Controller
{
    function index()
    {
     return view('login.index');
    }
    function checklogin(Request $request)
    {
      $request->validate([
           'name' => 'required|max:255|min:6',
           'password' => 'required|min:6|max:255',
            
        ],
        [
            
            'name.required' => 'Không được bỏ trông',
            'name.min' => 'Tài khoản tối thiểu 6 ký tự',
            'name.max' => 'Không được quá 255 ký tự',
            'password.required' => 'Không được bỏ trông',
            'password.min' => 'Mật khẩu tối thiểu 6 ký tự',
            'password.max' => 'Không được quá 255 ký tự',
]);

      $name = $request['name'];
      $password = $request['password'];
      //dd($request);
     // $user_data = array(
     //  'name'  => $request->name,
     //  'password' => $request->password,
     // );
    //   $id = Auth::user('name');
    // dd($id);
      if (Auth::attempt(['name'=>$name,'password'=>$password,'role'=>false,'isdelete'=>false])) {
            //$users = Auth::user();
          
          //Session::put('id',$customers);
          Session::put('user',Auth::user()->name);
         //dd($customers->id);
          return redirect('/');
        }
    if (Auth::attempt(['name'=>$name,'password'=>$password,'role'=>true])) {
           return redirect('product');
        }

     else
     {

      return back()->with('error', 'Tài khoản hoặc mật khẩu không đúng');
     }

    }


    function logout()
    {
      Session::forget('user');
     Auth::logout();
     return redirect('/');
    }

}
