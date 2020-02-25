<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\customers;
use App\Models\users;
use Carbon\Carbon;
use Session;

class CustomersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->seachname != null) {
            
            $customers = customers::where('first_name','like','%'.$request->seachname.'%')->get();
           return view('customers.index',compact('customers'));
        }
        if ($request->diachi != null) {
            
            $customers = customers::where('physical_address','like','%'.$request->diachi.'%')->get();
           return view('customers.index',compact('customers'));
        }
        $customers = customers::where('isdelete',false)->get();
        return view('customers.index',compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
       return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'email' => 'required|email|max:255',
           'postal_address' => 'required|max:255',
           'physical_address' => 'required|max:255',
            
        ],
        [
            'first_name.required' => 'Không được bỏ trông',
            'last_name.required' => 'Không được bỏ trông',
            'first_name.required' => 'Không được bỏ trông',
            'email.required' => 'Không được bỏ trông',
            'postal_address.required' => 'Không được bỏ trống',
            'physical_address.required' => 'Không được bỏ trống',

            'first_name.max:255' => 'Không được quá 255 ký tự',
            'last_name.max:255' => 'Không được quá 255 ký tự',
            'email.max:255' => 'Không được quá 255 ký tự',
            'postal_address.max:255' => 'Không được quá 255 ký tự',
            'physical_address.max:255' => 'Không được quá 255 ký tự',
            'email.max:255' => 'Bản Phải nhập đúng Email',
]);
        $users = users::where('name','like','%'.$request->name.'%')->where('isdelete',false)->first();
            //dd($brand);
            if ($users == true) {
                Session::flash('loi','Tài khoản đã tồn tại');
                return back();
            }
            else {
         $users_id = users::insertGetId([
            'name'=>$request->name,
             'role'=>false,
             'isdelete'=> false,
             'password'=>bcrypt($request->password),
            'created_at'=>Carbon::now()->toDateTimeString()        
        ]);
          $users_data = users::findOrfail($users_id);
         $customers_data = new customers([
            'first_name'=>$request->first_name,
            'last_name' => $request->last_name,
               'email' => $request->email,
                'isdelete'=> false,
               'postal_address' => $request->postal_address,
               'physical_address' => $request->physical_address,
                'created_at' => Carbon::now()->toDateTimeString(),
               
        ]);
            $users_data->customers()->save($customers_data);
    
        Session::flash('thongdiep','Bạn đã tạo thành công');
     
        return back();
    }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
         $customers = customers::findOrFail($id);
        return view('customers.show',compact('customers'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $customers = customers::findOrFail($id);
        return view('customers.edit',compact('customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $customers =customers::findOrFail($id);
         $request->validate([
            'first_name' => 'required|max:255',
           'last_name' => 'required|max:255',
           'email' => 'required|email|max:255',
           'postal_address' => 'required|max:255',
           'physical_address' => 'required|max:255',
            
        ],
        [
            'first_name.required' => 'Không được bỏ trông',
            'last_name.required' => 'Không được bỏ trông',
            'first_name.required' => 'Không được bỏ trông',
            'email.required' => 'Không được bỏ trông',
            'postal_address.required' => 'Không được bỏ trống',
            'physical_address.required' => 'Không được bỏ trống',

            'first_name.max:255' => 'Không được quá 255 ký tự',
            'last_name.max:255' => 'Không được quá 255 ký tự',
            'email.max:255' => 'Không được quá 255 ký tự',
            'postal_address.max:255' => 'Không được quá 255 ký tự',
            'physical_address.max:255' => 'Không được quá 255 ký tự',
            'email.email' => 'Bản Phải nhập đúng Email',
]);
        if ($customers) {
            $customers->first_name = $request->first_name;
            $customers->last_name = $request->last_name;
            $customers->email = $request->email;
            $customers->postal_address = $request->postal_address;
            $customers->physical_address = $request->physical_address;
            $customers->updated_at = Carbon::now()->toDateTimeString();
            $customers->update();
        }else  {
             return back()->with('loi','Chỉnh sửa không thành công');
         }
         return back()->with('thongdiep','Cập nhập thông tin thành công');
    }
 public function delete(Request $request, $id){
            dd($request);
 }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id,Request $request)
    {
        //dd($request->users);
        $customers = customers::findOrFail($id);
        $users = users::findOrFail($request->users);
        
          if ($users && $customers) {
              $users->isdelete = true;
               $users->update();
               $customers->isdelete = true;
               $customers->update();
             
           } else {
              return back()->with('loi','Dữ liệu không tồn tại');
          }
            return back()->with('thongdiep','Xóa thành công');
    }
}
