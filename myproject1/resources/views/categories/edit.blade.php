@extends('layouts.main')
@section('title','Chỉnh sửa')
@section('content')
	
<div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              	
                <h5 class="card-title">Chỉnh sửa loại hàng</h5>
                
              </div>
              <div class="card-body ">
		<div class="row">

			@if(Session::has('thongdiep'))
					<div class="alert alert-primary col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
		</div>
		{{ Form::model($categories,['route' => ['categorie.update',$categories->id ],'method' => 'put']) }}
		<div class="form-group {{ $errors->has('fullname') ?'has-error':'' }}">
			{{ Form::label('name','Tên loại hàng:') }}
			{{ Form::text('name',$categories->name,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('name')}}</span>
		</div>
			<div class="form-group {{ $errors->has('phone') ?'has-error':'' }}">
		
			{{ Form::label('Mô Tả :')}}
			{{ Form::text('description',$categories->description,['class'=>'form-control']) }}
			<span class="text-danger">{{$errors->first('phone')}}</span>
		</div>
			
			{{form::submit('Chỉnh sửa',['class'=>'btn btn-primary']) }}
				<a style="margin: 10px" href="{{route('categorie.index')}} "class="btn btn-success">Trở về</a>
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

