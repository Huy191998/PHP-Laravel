<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\brands;
use App\Models\products;
use Carbon\Carbon;
use App\Http\Requests\BrandRequest;
use Session;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request->seachname != null) {
            
            $brands = brands::where('name','like','%'.$request->seachname.'%')->get();
            return view('brands.index',compact('brands'));
        }
        //$brands = brands::all();
         $brands = brands::where('isdelete',false)->get();
        return view('brands.index',compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('brands.create');
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
            'name' => 'required|max:255',
           'description' => 'required|max:255',
            
        ],
        [
            'name.required' => 'Không được bỏ trông',
            'description.required' => 'Không được bỏ trống',
            'name.max:255' => 'Không được quá 255 ký tự',
            'description.max:255' => 'Không được quá 255 ký tự',
]);
            $brand = brands::where('name','like','%'.$request->name.'%')->where('isdelete',false)->first();
            //dd($brand);
            if ($brand == true) {
                Session::flash('loi','Nhà sản xuất đã tồn tại');
                return back();
            }
            else {
                $brands = new brands();
                $brands->name = $request->name;
                $brands->description = $request->description;
                $brands->isdelete = false;
                $brands->created_at = Carbon::now()->toDateTimeString() ;
                $brands->save();
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
        $brands = brands::findOrFail($id);
        return view('brands.show',compact('brands'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $brands = brands::findOrFail($id);
        return view('brands.edit',compact('brands'));
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
        $brand =brands::findOrFail($id);
         $request->validate([
            'name' => 'required|max:255',
           'description' => 'required|max:255',
            
        ],
        [
            'name.required' => 'Không được bỏ trông',
            'description.required' => 'Không được bỏ trống',
            'name.max:255' => 'Không được quá 255 ký tự',
            'description.max:255' => 'Không được quá 255 ký tự',
]);

        if ($brand) {
           $brand->name = $request->name;
           $brand->description = $request->description;
           $brand->updated_at = Carbon::now()->toDateTimeString();
           $brand->update();
        }else  {
             return back()->with('loi','Chỉnh sửa không thành công');
         }
         return back()->with('thongdiep','Chỉnh sửa thành công');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $brands = brands::findOrFail($id);
          if ($brands) {
               $brands->isdelete = true;
                $brands->update();
          } else {
              return back()->with('loi','Dữ liệu không tồn tại');
          }
            return back()->with('thongdiep','Xóa thành công');
    }
}
