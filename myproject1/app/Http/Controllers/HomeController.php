<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\categories;
use App\Models\brands;
use App\Models\products;
use Carbon\Carbon;
use Illuminate\Support\Str;
use Session;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = products::where('isdelete',false)->get();
        $categories = categories::all();
        return view('home.index',compact('categories','products'));
    }
    public function seach(Request $request)
    {
        $products = products::where('product_name','like','%'.$request->value.'%')->where('isdelete',false)->get();
         $categories = categories::where('isdelete',false)->get();
         return view('home.indexseach',compact('products','categories'));
    }
   public function indexcategories($id)
    {

       $products = products::where('categorie_id','like',$id)->where('isdelete',false)->get();
        $categories = categories::where('isdelete',false)->get();
        return view('home.indexcategories',compact('products','categories'));
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
        echo "string";   

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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
