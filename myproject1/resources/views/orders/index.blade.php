@extends('layouts.main')
@section('title','Danh sách đặt hàng')
@section('content')


		
	<div class="content">
        
        <div class="row">
        	
			
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              	
                <h5 class="card-title">orders</h5>
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
              </div>
              <div class="card-body ">
              		{{ Form::open(['route' => ['order.index' ],'method' => 'get']) }}
			
	<!-- 	<div class="form-group col-6" style="float: left;">
			{{ Form::label('Tên khách hàng :')}}
			{{ Form::text('seachname','',['class'=>'form-control ','style'=>'float: left']) }}
		
				
				
				{{form::submit('Seach',['class'=>'btn btn-danger','style'=>'float: left']) }}
				</div> -->
				<div class="form-group col-6" style="float: left;">
			
		
				{{ Form::label('Mã đặt hàng :')}}
			{{ Form::text('madathang','',['class'=>'form-control ','style'=>'float: left']) }}
				
				{{form::submit('Tìm kiếm',['class'=>'btn btn-danger','style'=>'float: left']) }}
				</div>
				{{ Form::close() }}
	<table class="table ">
		<thead>
			<th style="text-align:center;">STT</th>
			<th style="text-align:center;">Tên khách hàng </th>
			<th style="text-align:center;">Mã Đặt Hàng</th>
			<th style="text-align:center;">Thành tiền </th>
			<th >Thao tác</th>
		</thead>
		<tbody>
			
			@foreach( $orders as $key => $orders )
			<tr>
				<td style="text-align:center;">{{ ++$key }}</td>
				<td style="text-align:center;"> {{ $orders->customers->last_name }} {{ $orders->customers->first_name }}</td>
				<!-- <td style="text-align:center;">{{ date('d-m-Y', strtotime($orders->order_number))}}</td>	 -->
				<td style="text-align:center;">{{$orders->order_number}}</td>
				<td style="text-align:center;">{{  $orders->total_amount}}</td>
				<td >
	
			
				<a href="{{route('order.show',$orders->id)}}" style="float: left;margin-right: 10px" class="btn btn-primary">Chi tiết</a>
				{{ Form::open(['route' => ['order.destroy',$orders->id ],'method' => 'Delete']) }}
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
