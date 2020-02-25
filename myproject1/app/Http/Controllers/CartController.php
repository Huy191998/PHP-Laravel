<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\products;
use App\Models\categories;
use App\Models\brands;
use App\Models\User;
use App\Models\customers;
use App\Models\orders;
use App\Models\orders_details;
use Carbon\Carbon;
use Cart;
use Auth;



class CartController extends Controller
{
     public function __construct()
    {
        $products = products::all();
        $category = categories::where('id',1)->get();
        view()->share(['category' => $category]);
        view()->share('products',$products);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cart = Cart::content();
        $customer = customers::where('users_id','like',Auth::user()->id)->pluck('first_name','id');
       // $customer = customers::where('isdelete',false)->pluck('first_name','id')->toArray();
        return view('home.cart', compact('cart','customer'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //dd($request->qyt+1);
      
      if($request->cong){
            
               $a = $request->qyt+1;
               //dd($a);
                Cart::update($id,$a);
                return back();
          
        }
        if($request->tru){
            if($request->qty == 1){
                return back()->with('loi','so luong phai lon hon 0');
            }else{
                $a = $request->qyt-1;
                Cart::update($id,$a);
                return back();
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //dd($id);
        Cart::remove($id);
        return back()->with('thongbao','xóa thanh cong');
    }

    public function addCart($id, Request $request)
    {
        //dd($request->qty);
        $product = products::find($id);
        if($request->qty){
            $qty = $request->qty;
        }else{
            $qty = 1;
        }
        if($product->promotional>0){
            $price = $product->promotional;
        }else{
            $price = $product->price;
        }
        $cart = ['id' => $id, 'name' => $product->product_name, 'qty' => $qty, 'price' => $product->price, 'options' => ['img' => $product->images]];
        Cart::add($cart);
        // dd(Cart::content());
        return back()->with('thongbao','Đã mua hàng '.$product->name.' thành công');
        
    }

    // public function checkout()
    // {
    //     $user = Auth::user();
    //     $price = str_replace(',', '', Cart::total());
    //     return view('home.checkout',compact('user','price'));  
    // }
    public function thanhtoan(Request $request)
    {
        //dd($request);
        $request->validate([
            'customer_id' => 'required',
           
            
        ],
        [
            'customer_id.required' => 'Không được bỏ trông',
            
]);
        
        $cartInfor = Cart::content();
        //dd($cartInfor);
        $order_id = orders::insertGetId([
            'order_number' => rand(),
            'isdelete'=>false,
            'transaction_date' => Carbon::now()->toDateTimeString(),
            'status' => 'Chưa giao',
            'total_amount' => str_replace(',', '', Cart::total()),
            'customer_id' => $request->customer_id,
            'created_at' => Carbon::now()->toDateTimeString(),
            'updated_at' => Carbon::now()->toDateTimeString()
        ]); 
        $orders_data = orders::findOrFail($order_id);
        //dd($request);  
        if (count($cartInfor) > 0) {
            foreach ($cartInfor as $key => $item) {
                $orders_detail_id = orders_details::insertGetId([
                    'quantity' => $item->qty,
                    'price' => $item->price,
                    'sub_toal' => $item->qty *$item->price ,
                    'order_id' => $order_id,
                    'product_id' =>$item->id,
                    'created_at' => Carbon::now()->toDateTimeString(),
                    'updated_at' => Carbon::now()->toDateTimeString()
                ]);
                $orders_detail_data = orders_details::findOrFail($orders_detail_id);
            }
        }
        Cart::destroy();
        
        return back()->with('thongbao','Đã mua hàng thành công');
    }
}
