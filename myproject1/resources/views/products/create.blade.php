@extends('layouts.main')
@section('title','Tạo sản phẩm')
@section('content')
	
<div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              	
                <h5 class="card-title">Tạo sản phẩm</h5>
                
              </div>
              <div class="card-body ">
		<div class="row">
			@if(Session::has('loi'))
					<div class="alert alert-danger col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('loi')}}</p>						
					</div>
				
			@endif
			@if(Session::has('thongdiep'))
					<div class="alert alert-primary col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
		</div>
		
		{{ Form::open(['route' => 'product.store', 'method' => 'post','enctype '=>'multipart/form-data']) }}
	
		<div class="form-group {{ $errors->has('product_name') ?'has-error':'' }}">
			{{ Form::label('name','Tên sản phẩm	:') }}
			{{ Form::text('product_name','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('product_name')}}</span>
		</div>
		<div class="form-group {{ $errors->has('description') ?'has-error':'' }}">
			{{ Form::label('name','Mô tả:') }}
			{{ Form::text('description','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('description')}}</span>
		</div>
		<div class="form-group {{ $errors->has('images') ?'has-error':'' }}">
			{{ Form::label('Hình ảnh ' ,'Hình ảnh') }}
			<input multiple="multiple" name="images[]" type="file" class="form-control">
			
			<span class="text-danger">{{$errors->first('images')}}</span>
		</div>
		<div class="form-group {{ $errors->has('price') ?'has-error':'' }}">
		
			{{ Form::label('Giá :')}}
			{{ Form::number('price','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('price')}}</span>
		</div>
		<div class="form-group {{ $errors->has('brand_id') ?'has-error':'' }}">
		{{ Form::label('Thương hiệu :')}}
		<select class="form-control" name="brand_id">
   
			
			    
			  @foreach ($brands as $key => $brands)
			    <option value="{{$brands->id}}" > 
			        {{ $brands->name }} 
			    </option>
			  @endforeach 
			  <span class="text-danger">{{$errors->first('brand_id')}}</span>   
		</select>
		</div>
		<div class="form-group {{ $errors->has('categorie_id') ?'has-error':'' }}">
		{{ Form::label('Loại sản phẩm:')}}
		<select class="form-control" name="categorie_id">
   
			
			    
			  @foreach ($categories as $key => $categories)
			    <option value="{{$categories->id}}" > 
			        {{ $categories->name }} 
			    </option>
			  @endforeach   
			  <span class="text-danger">{{$errors->first('categorie_id')}}</span>    
		</select>
		
		</div>
			{{form::submit('Khởi tạo',['class'=>'btn btn-primary']) }}
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
