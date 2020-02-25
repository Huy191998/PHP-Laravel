@extends('layouts.main')
@section('title','Danh sách khách hàng')
@section('content')


		
	<div class="content">
        
        <div class="row">
        	
			
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              	
                <h5 class="card-title">Quản lý khách hàng</h5>
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
                <!-- <a style="margin: 10px" href="{{route('customer.create')}} "class="btn btn-success">Tạo khách hàng</a>	 -->
                
              </div>
              {{ Form::open(['route' => ['customer.index' ],'method' => 'get']) }}
			
		<div class="form-group col-6" style="float: left;">
			{{ Form::label('Tên khách hàng :')}}
			{{ Form::text('seachname','',['class'=>'form-control ','style'=>'float: left']) }}
		
				{{form::submit('Tìm kiếm',['class'=>'btn btn-danger','style'=>'float: left']) }}
				</div>
				<div class="form-group col-6" style="float: left;">
			
			{{ Form::label('Địa chỉ :')}}
			{{ Form::text('diachi','',['class'=>'form-control ','style'=>'float: left']) }}
				
				
				</div>

				{{ Form::close() }}
              <div class="card-body ">
	<table class="table ">
		<thead>
			<th style="text-align:center;">STT</th>
			<th style="text-align:center;">Tên khách hàng</th>
			<th style="text-align:center;">Email</th>
			<th style="text-align:center;">Địa chỉ</th>
			<!-- <th style="text-align:center;">Mã bưu điện</th> -->
			<th >Thao tác</th>
		</thead>
		<tbody>

			@foreach( $customers as $key => $customers )
			<tr>
				<td style="text-align:center;">{{ ++$key }}</td>
				<td style="text-align:center;">{{ $customers->first_name }} {{  $customers->last_name}}</td>	
				<td style="text-align:center;">{{ $customers->email }}</td>
				<td style="text-align:center;">{{ $customers->physical_address }}</td>
				<!-- <td style="text-align:center;">{{ $customers->postal_address }}</td> -->
				<td >

				
				<a href="{{route('customer.show',$customers->id)}}" style="float: left;margin-right: 10px" class="btn btn-primary">Chi tiết</a>
				{{ Form::open(['route' => ['customer.destroy',$customers->id],'method' => 'Delete']) }}
				 {!! Form::hidden('users', $customers->users_id) !!}
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
