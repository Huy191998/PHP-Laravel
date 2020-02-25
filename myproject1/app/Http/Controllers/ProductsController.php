<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\brands;
use App\Models\products;
use Carbon\Carbon;

use Session;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
            $brands = brands::where('isdelete',false)->get();
           $categories = categories::where('isdelete',false)->get();
          
        if ($request->seachname != null) {
            
            $products = products::where('product_name','like','%'.$request->seachname.'%')->get();
            return view('products.index',compact('products','categories','brands'));
        }
      
          if ($request->seachbrand != null) {
            
            $products = products::where('brand_id','like',$request->seachbrand)->get();
           return view('products.index',compact('products','categories','brands'));
        }
        //   if ($request->seachcategorie != null) {
        //     dd($request->seachcategorie);
        // }
            $products = products::with('brands','categories')->where('isdelete',false)->get();
        return view('products.index',compact('products','categories','brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $brands = brands::where('isdelete',false)->get();        
        $categories = categories::where('isdelete',false)->get(); 
        return view('products.create',compact('brands','categories'));
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
            'product_name' => 'required|max:255',
           'description' => 'required|max:255',
            'price' => 'required|numeric',
            'images' => 'required',
            'brand_id' => 'required',
            'categorie_id' => 'required',
       
            
        ],
        [
            'product_name.required' => 'Không được bỏ trông',
            'description.required' => 'Không được bỏ trống',
            'price.required' => 'Không được bỏ trông',
            'images.required' => 'Không được bỏ trông',
            'brand_id.required' => 'Không được bỏ trông',
            'categorie_id.required' => 'Không được bỏ trông',
            'product_name.max:255' => 'Không được quá 255 ký tự',
            'description.max:255' => 'Không được quá 255 ký tự',
]);
         $product = products::where('product_name','like','%'.$request->product_name.'%')->where('isdelete',false)->first();
            //dd($brand);
            if ($product == true) {
                Session::flash('loi','Sản phẩm đã tồn tại');
                return back();
            }
            else {
        if($request->hasFile('images'))
                {

                    foreach($request->file('images') as $image)
                        {
                            $name=$image->getClientOriginalName();
                            $image->move('img', $name);  
                            $data[] = $name;  
                            //echo $data;

                        }
                         // $name=$request->image->getClientOriginalName();
                         //    $image->move('img', $name); 
                                     
                }
                
                        $products = new  products();
                        $products->product_code = 'LARAVEl-'.Carbon::now()->toDateString();
                        $products->product_name = $request->product_name;
                        $products->description = $request->description;
                        $products->price = $request->price;
                        $products->isdelete = false;
                        $products->brand_id = $request->brand_id;
                        $products->categorie_id = $request->categorie_id;
                        $products->images =json_encode($data);
                        $products->save();
                        // Session::flash('thongdiep','Luu Thanh cong');
                        // return back();
                       // echo "string";
         Session::flash('thongdiep','Bạn đã lưu thanh công');
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
        $product = products::findOrFail($id);
        $brands = brands::pluck('name','id')->toArray();
        $categories = categories::pluck('name','id')->toArray();
        // $product = products::with('categories','brands')->get();
            return view('products.edit',compact('product','brands','categories'));
    }
public function chitiet($id)
    {
        $product = products::findOrFail($id);
        $brands = brands::pluck('name','id')->toArray();
        $categories = categories::where('isdelete',false)->get(); 
        // $product = products::with('categories','brands')->get();
            return view('products.chitiet',compact('product','brands','categories'));
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
        $request->validate([
            'product_name' => 'required|max:255',
           'description' => 'required|max:255',
            'price' => 'required|numeric',
            
            'brand_id' => 'required',
            'categorie_id' => 'required',
       
            
        ],
        [
            'product_name.required' => 'Không được bỏ trông',
            'description.required' => 'Không được bỏ trống',
            'price.required' => 'Không được bỏ trông',
           
            'brand_id.required' => 'Không được bỏ trông',
            'categorie_id.required' => 'Không được bỏ trông',
            'product_name.max:255' => 'Không được quá 255 ký tự',
            'description.max:255' => 'Không được quá 255 ký tự',
]);
       $products =products::findOrFail($id);
       if ($products) {
          if($request->hasFile('images'))
                {

                    foreach($request->file('images') as $image)
                        {
                            $name=$image->getClientOriginalName();
                            $image->move('img', $name);  
                            $data[] = $name;  
                            //echo $data;

                        }
                      
                        $products->product_code = $products->product_code;
                        $products->product_name = $request->product_name;
                        $products->description = $request->description;
                        $products->price = $request->price;
                        $products->brand_id = $request->brand_id;
                        $products->categorie_id = $request->categorie_id;
                        $products->images =json_encode($data);
                        $products->updated_at = Carbon::now()->toDateTimeString();
                        $products->update();
                         return back()->with('thongdiep','Cập nhập thành công');
                                     
                }else{
               $products->product_code = $products->product_code;
                        $products->product_name = $request->product_name;
                        $products->description = $request->description;
                        $products->price = $request->price;
                        $products->brand_id = $request->brand_id;
                        $products->categorie_id = $request->categorie_id;
                         $products->images =$products->images;
                        $products->updated_at = Carbon::now()->toDateTimeString();
                        $products->update();
                        return back()->with('thongdiep','Cập nhập thành công');
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
        $products = products::findOrFail($id);
          if ($products) {
              $products->isdelete =true;
              $products->update();

          } else {
              return back()->with('loi','Dữ liệu không tồn tại');
          }
            return back()->with('thongdiep','Xóa thành công');
    }
}
