@extends('layouts.main')
@section('title','Create order')
@section('content')
	
<div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              	<a style="margin: 10px" href="{{route('product.create')}} "class="btn btn-success">Create brand</a>	
                <h5 class="card-title">Product</h5>
                
              </div>
              <div class="card-body ">
		<div class="row">

			@if(Session::has('thongdiep'))
					<div class="alert alert-primary col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
		</div>
		
		{{ Form::open(['route' => 'product.store', 'method' => 'post','enctype '=>'multipart/form-data']) }}
	
		<div class="form-group {{ $errors->has('fullname') ?'has-error':'' }}">
			{{ Form::label('name','Product name	:') }}
			{{ Form::text('product_name','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('name')}}</span>
		</div>
		<div class="form-group {{ $errors->has('fullname') ?'has-error':'' }}">
			{{ Form::label('Status:') }}
			{{ Form::text('status','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('name')}}</span>
		</div>
		
		<div class="form-group {{ $errors->has('phone') ?'has-error':'' }}">
		
			{{ Form::label('price :')}}
			{{ Form::number('price','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('phone')}}</span>
		</div>
		{{ Form::label('Product :')}}
		
		<select class="form-control" name="categorie_id">
   
			
			    
			  @foreach ($products as $key => $products)
			    <option value="{{$products->id}}" > 
			        {{ $products->product_name }} 
			    </option>
			  @endforeach    
		</select>
		<div class="form-group {{ $errors->has('phone') ?'has-error':'' }}">
		{{ Form::label('Customers :')}}
		
		<select class="form-control" name="categorie_id">
   
			
			    
			  @foreach ($customers as $key => $customers)
			    <option value="{{$customers->id}}" > 
			        {{ $customers->first_name }} 
			    </option>
			  @endforeach    
		</select>
		
		</div>
			{{form::submit('Create',['class'=>'btn btn-primary']) }}
			<a style="margin: 10px" href="{{route('product.index')}} "class="btn btn-success">Back brand</a>
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
