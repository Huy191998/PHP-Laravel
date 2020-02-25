@extends('layouts.main')
@section('title','Nhà sản xuất')
@section('content')


		
	<div class="content">
        
      
        	
		
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              		
                <h5 class="card-title">Quản lý nhà sản xuất</h5>
                	@if(Session::has('thongdiep'))
					<div class="alert alert-primary" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
			@if(Session::has('loi'))
					<div class="btn btn-dange" role="alert">
						 <p class="">{{Session::get('loi')}}</p>						
					</div>
				
			@endif
                <a style="margin: 10px" href="{{route('brand.create')}} "class="btn btn-success">Tạo nhà sản xuất</a>
              </div>
              <div class="card-body ">
              		{{ Form::open(['route' => ['brand.index' ],'method' => 'get']) }}
			
		<div class="form-group " style="float: left;">
			{{ Form::label('Tên thương hiệu :')}}
			{{ Form::text('seachname','',['class'=>'form-control ','style'=>'float: left']) }}
		
		
				
				{{form::submit('Tìm kiếm',['class'=>'btn btn-danger','style'=>'float: left']) }}
				</div>
				{{ Form::close() }}
	<table class="table ">
		<thead>
			<th style="text-align:center;">STT</th>
			<th style="text-align:center;">Tên nhà sản xuất</th>
			<th style="text-align:center;">Mô tả</th>
			<th >Thao tác</th>
		</thead>
		<tbody>
			
			@foreach( $brands as $key => $brands )
			<tr>
				<td style="text-align:center;">{{ ++$key }}</td>
				<td style="text-align:center;">{{ $brands->name }}</td>	
				<td style="text-align:center;">{{  $brands->description}}</td>
				<td >

				<!-- <a href="{{route('brand.show',$brands->id)}}" style="float: left;" class="btn btn-secondary">show</a> -->
				<a href="{{route('brand.edit',$brands->id)}}" style="float: left;margin-right: 10px" class="btn btn-primary">Sửa</a>
				{{ Form::open(['route' => ['brand.destroy',$brands->id ],'method' => 'Delete']) }}
				{{form::submit('Xóa',['class'=>'btn btn-danger','style'=>'float: left']) }}
				{{ Form::close() }}
			</tr>
			</tr>

			@endforeach
			
		</tbody>
	</table>
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
