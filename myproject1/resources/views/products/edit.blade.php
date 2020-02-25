@extends('layouts.main')
@section('title','Chỉnh sửa thông tin')
@section('content')
	
<div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              	
                <h5 class="card-title">Chỉnh sửa sản phẩm</h5>
                
              </div>
              <div class="card-body ">
	

			
		@if(Session::has('thongdiep'))
					<div class="alert alert-primary col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
		
		
	{{ Form::model($product,['route' => ['product.update',$product->id ],'method' => 'put','enctype '=>'multipart/form-data']) }}
		<div class="form-group {{ $errors->has('product_name') ?'has-error':'' }}">
			{{ Form::label('name','Tên sản phẩm	:') }}
			{{ Form::text('product_name',$product->product_name,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('product_name')}}</span>
		</div>
		<div class="form-group {{ $errors->has('') ?'has-error':'' }}">
			{{ Form::label('name','Mã sản phẩm:') }}
			{{ Form::text('product_code',$product->product_code,['class'=>'form-control','readonly' => 'true']) }}
			<span class="text-danger">{{$errors->first('')}}</span>
		</div>
		<div class="form-group {{ $errors->has('description') ?'has-error':'' }}">
			{{ Form::label('name','Mô tả:') }}
			{{ Form::text('description',$product->description,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('description')}}</span>
		</div>
		<div class="form-group">
			{{ Form::label('Hình ảnh','Hình ảnh') }}
			<input  multiple="multiple" name="images[]" value="" type="file" class="form-control">
			
			
		</div>
		<div class="form-group {{ $errors->has('price') ?'has-error':'' }}">
		
			{{ Form::label('Giá :')}}
			{{ Form::number('price',$product->price,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('price')}}</span>
		</div>
		<div class="form-group {{ $errors->has('brand_id') ?'has-error':'' }}">
		{{ Form::label('Thương hiệu :')}}
		{{ Form::select('brand_id',$brands,$product->brands->id,['class'=>'form-control']) }}
		<span class="text-danger">{{$errors->first('brand_id')}}</span>
		</div>
		<div class="form-group {{ $errors->has('categorie_id') ?'has-error':'' }}">
		{{ Form::label('Loại sản phẩm :')}}
		{{ Form::select('categorie_id',$categories,$product->categories->id,['class'=>'form-control']) }}
		<span class="text-danger">{{$errors->first('categorie_id')}}</span>
		</div>
			{{form::submit('Chỉnh sửa',['class'=>'btn btn-primary']) }}
				<a style="margin: 10px" href="{{route('product.index')}} "class="btn btn-success">Trở về</a>
		{{ Form::close() }}
	</div>


	
	          
              <div class="card-footer ">
                <hr>
                <div class="stats">
                  <i class="fa fa-history"></i> PHP LARAVEL
                </div>
              </div>
            </div>
          </div>
        </div>
      
      </div>
     
    </div>
@endsection
