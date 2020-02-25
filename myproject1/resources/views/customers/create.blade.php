@extends('layouts.layouts')
@section('title','Tạo tài khoản')
@section('content')

    <div class="content"  style="height: 650px">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card " style="margin-top: 100px">
              <div class="card-header ">
              
                <h5 class="card-title">Tạo Tài Khoản</h5>
                
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
		{{ Form::open(['route' => 'customer.store', 'method' => 'post']) }}
		<div class="form-group {{ $errors->has('name') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Tên đăng nhập:') }}
			{{ Form::text('name','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('name')}}</span>
		</div>
		<div class="form-group {{ $errors->has('password') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Mật khẩu:') }}
			{{ Form::password('password',['class'=>'form-control']) }}

			<span class="text-danger">{{$errors->first('password')}}</span>
		</div>
		<div class="form-group {{ $errors->has('last_name') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Họ:') }}
			{{ Form::text('last_name','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('last_name')}}</span>
		</div>
		<div class="form-group {{ $errors->has('first_name') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Tên:') }}
			{{ Form::text('first_name','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('first_name')}}</span>
		</div>
		
		<div class="form-group {{ $errors->has('email') ?'has-error':'' }} col-6" style="float: left;">
			{{ Form::label('name','Email:') }}
			{{ Form::text('email','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('email')}}</span>
		</div>
		<div class="form-group {{ $errors->has('postal_address') ?'has-error':'' }} col-6" style="float: left;">
		
			{{ Form::label('Mã bưu điện :')}}
			{{ Form::text('postal_address','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('postal_address')}}</span>
		</div>
		<div class="form-group {{ $errors->has('physical_address') ?'has-error':'' }} col-6" style="float: left;">
		
			{{ Form::label('Địa Chỉ :')}}
			{{ Form::text('physical_address','',['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('physical_address')}}</span>
		</div>
			<div class="form-group col-6" style="float: left;margin-top: 20px">
		
			{{form::submit('Tạo tài khoản',['class'=>'btn btn-primary']) }}
			<a style="margin: 10px" href="http://localhost:88/myproject1/public/" class="btn btn-success">Trở về</a>
		</div>
		{{ Form::close() }}
	</div>
	
	          

          </div>
        </div>
      
      </div>
     
    </div>

 @endsection
