@extends('layouts.layouts')
@section('title','Cập nhâp thông tin')
@section('content')

    <div class="content" style="height: 650px">
        
        <div class="row" >
          <div class="col-md-12">
            <div class="card " style="margin-top: 100px">
              <div class="card-header ">
              	
                <h5 class="card-title">Chỉnh sửa thông tin </h5>
                
              </div>
              <div class="card-body ">
		<div class="row">

			@if(Session::has('thongdiep'))
					<div class="alert alert-primary col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
		</div>
		{{ Form::model($customers,['route' => ['customer.update',$customers->id ],'method' => 'put']) }}
		<div class="form-group {{ $errors->has('name') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Họ:') }}
			{{ Form::text('last_name',$customers->last_name,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('last_name')}}</span>
		</div>
		<div class="form-group {{ $errors->has('name') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Tên:') }}
			{{ Form::text('first_name',$customers->first_name,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('first_name')}}</span>
		</div>
		
		<div class="form-group {{ $errors->has('name') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Email:') }}
			{{ Form::text('email',$customers->email,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('email')}}</span>
		</div>
		<div class="form-group {{ $errors->has('name') ?'has-error':'' }} col-6" style="float: left;">
		
			{{ Form::label('Địa Chỉ:')}}
			{{ Form::text('physical_address',$customers->physical_address,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('physical_address')}}</span>
		</div>
			
			<div class="form-group {{ $errors->has('name') ?'has-error':'' }} col-6" style="float: left;">
		
			{{ Form::label('Mã bưu điện :')}}
			{{ Form::text('postal_address',$customers->postal_address,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('postal_address')}}</span>
		</div>
			<div class="form-group {{ $errors->has('name') ?'has-error':'' }} col-6" style="float: left;margin-top: 20px">
				{{form::submit('Chỉnh sửa',['class'=>'btn btn-primary']) }}
				<a style="margin: 10px" href="{{route('customer.index')}} "class="btn btn-success">Trở về</a>
			</div>	
		{{ Form::close() }}
	</div>


	
	          
             
            </div>
          </div>
        </div>
      
      </div>
     
 @endsection