@extends('layouts.main')
@section('title','Cập nhập')
@section('content')
	
	<div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              
                <h5 class="card-title">Chỉnh sửa thương hiệu</h5>
                
              </div>
              <div class="card-body ">
		

			@if(Session::has('thongdiep'))
					<div class="alert alert-primary col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
	
		
		
		
		{{ Form::model($brands,['route' => ['brand.update',$brands->id ],'method' => 'put']) }}
		<div class="form-group {{ $errors->has('name') ?'has-error':'' }}">
			{{ Form::label('name','Tên nhà sản xuất:') }}
			{{ Form::text('name',$brands->name,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('name')}}</span>
		</div>
			<div class="form-group {{ $errors->has('description') ?'has-error':'' }}">
		
			{{ Form::label('Mô tả :')}}
			{{ Form::text('description',$brands->description,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('description')}}</span>
		</div>
			
			{{form::submit('Chỉnh Sửa',['class'=>'btn btn-primary']) }}
				<a style="margin: 10px" href="{{route('brand.index')}} "class="btn btn-success">Trở về</a>
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