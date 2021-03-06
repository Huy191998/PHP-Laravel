@extends('layouts.layouts')
@section('title','Home')

@section('content')
<div class="container">
<div class="row" style="margin-top: 50px">
          @foreach( $products as $key => $products )
          <div class="col-lg-4 col-md-6 mb-4">
            <div class="card h-100">
             @foreach(json_decode($products->images,true) as $ka =>$image)
          <img  style="z-index:{{++$ka}};position: absolute; width: 254px;height: 150px"  class="" src="{!! asset("/img/$image") !!}"   >

          @endforeach 
              <a href="#"><img class="card-img-top" src="" alt=""></a>
              <div class="card-body" style="margin-top: 140px">
                <h4 class="card-title">
                  <a href="{{route('product.chitiet',$products->id)}}">{{$products->product_name}}</a>
                </h4>
                <h5>{{$products->price}}đ</h5>
                <p class="card-text">{!! \Illuminate\Support\Str::words($products->description, 30,'....')  !!}</p>
              </div>
              <a href="{{route('addCart',['id'=>$products->id])}}"  class="btn btn-success"><i class="fa fa-cart-plus"></i></a>
              <div class="card-footer">
                <small class="text-muted">&#9733; &#9733; &#9733; &#9733; &#9734;</small>
              </div>
            </div>
          </div>
          
           @endforeach

        </div>
</div>
@endsection
