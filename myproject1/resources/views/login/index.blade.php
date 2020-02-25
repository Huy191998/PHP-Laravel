@extends('layouts.layouts')
@section('title','Đăng nhập')
@section('content')
    <div class="content" style="height: 650px;width: 700px;margin: 0 auto">
        
        <div class="row" >
          <div class="col-md-12">
            <div class="card " style="margin-top: 100px">
              <div class="card-header ">
                
                <h3 align="center">Đăng Nhập Tài Khoản</h3><br />
                
              </div>
              <div class="card-body ">
 
  

    @if(Session::has('error'))
          <div class="alert alert-primary col-12" style="margin: 10px" role="alert">
             <p class=""><span class="text-danger">{{Session::get('error')}}</span></p>            
          </div>
        
      @endif

   {{ Form::open(['route' => 'checklogin', 'method' => 'post']) }}
    {{ csrf_field() }}
    <div class="form-group {{ $errors->has('name') ?'has-error':'' }}">
      {{ Form::label('name','Tên đăng nhập:') }}
      {{ Form::text('name','',['class'=>'form-control']) }}
      <span class="text-danger">{{$errors->first('name')}}</span>
    </div>
    <div class="form-group {{ $errors->has('password') ?'has-error':'' }}">
      {{ Form::label('name','Mật khẩu:') }}
      {{ Form::password('password',['class'=>'form-control']) }}

      <span class="text-danger">{{$errors->first('password')}}</span>
    </div>
    <div class="form-group">
     {{form::submit('Đăng Nhập',['class'=>'btn btn-primary']) }}
     <a href="{{route('customer.create')}}">Tạo tài khoản</a>
    </div>
  {{ Form::close() }}
  </div>


  
            </div>
             
            </div>
          </div>
        </div>
      

 @endsection
