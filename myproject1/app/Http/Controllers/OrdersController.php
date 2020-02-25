<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\orders;
use App\Models\orders_details;
use App\Models\customers;
use App\Models\products;
use Session;
class OrdersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->madathang != null) {
            
            //dd($request->seachname);
             //$customers = customers::where('first_name','like',$request->seachname,)->get();
             //dd($customers);
             $orders = orders::where('order_number',$request->madathang)->get();
             //dd($orders);
            return view('orders.index',compact('orders'));
        }
        // if ($request->seachname != null) {
            
            
        //      $orders = orders::where('isdelete',false)->with('customers')->get();
        //      $customers = customers::where('first_name','like','%'.$request->seachname.'%')->get();
        //      //dd($orders);
        //     return view('orders.index',compact('orders','customers'));
        // }

        $orders = orders::where('isdelete',false)->with('customers')->get();
        return view('orders.index',compact('orders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $customers = customers::all();
        $products = products::all();
        //dd($products);
        return view('orders.create',compact('customers','products'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

         $orders = orders::findOrFail($id);

        if ($orders) {
            $customers = customers::where('id','like',$orders->customer_id,)->get();
            $orders_details = orders_details::where('order_id','like',$orders->id)->get();
           
             return view('orders.show',compact('orders','customers','orders_details'));
        }
       
       
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
       $orders =orders::findOrFail($id);
        if ($orders) {
          $orders->status = $request->status;
          $orders->update();  
        }
        return back()->with('thongdiep','Cập nhập thành công');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $orders = orders::findOrFail($id);
          if ($orders) {
              $orders->isdelete = true;
               $orders->update();
           } else {
              return back()->with('loi','Dữ liệu không tồn tại');
          }
            return back()->with('thongdiep','Xóa thành công');
    }
    
}
