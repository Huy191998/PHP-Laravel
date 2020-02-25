<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use Carbon\Carbon;
use Session;

class CategoriesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
         if ($request->seachname != null) {
            
            $categories = categories::where('name','like','%'.$request->seachname.'%')->get();
             return view('categories.index',compact('categories'));
        }
        $categories = categories::where('isdelete',false)->get();
        return view('categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('categories.create');
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
        $categorie = categories::where('name','like','%'.$request->name.'%')->where('isdelete',false)->first();
            //dd($brand);
            if ($categorie == true) {
                Session::flash('loi','Loại hàng đã tồn tại');
                return back();
            }
            else {
        
            $categories = new categories();
            $categories->name = $request->name;
            $categories->description = $request->description;
            $categories->created_at = Carbon::now()->toDateTimeString() ;
            $categories->isdelete = false;
            $categories->save();
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
        $categories = categories::findOrFail($id);
        return view('categories.edit',compact('categories'));
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
        
      $categories =categories::findOrFail($id);
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
        if ($categories) {
           $categories->name = $request->name;
           $categories->description = $request->description;
           $categories->updated_at = Carbon::now()->toDateTimeString();
           $categories->update();
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
       $categories = categories::findOrFail($id);
          if ($categories) {
               $categories->isdelete = true;
               $categories->update();
          } else {
              return back()->with('loi','Dữ liệu không tồn tại');
          }
            return back()->with('thongdiep','Xóa thành công');
    }
}
