@extends('layouts.main')
@section('title','Chi tiết đơn đặt hàng')
@section('content')

	
<div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              
                <h5 class="card-title">Chi tiết đặt hàng</h5>
                
              </div>
              <div class="card-body ">
		<div class="row">

			@if(Session::has('thongdiep'))
					<div class="alert alert-primary col-12" style="margin: 10px" role="alert">
						 <p class="">{{Session::get('thongdiep')}}</p>						
					</div>
				
			@endif
		</div>
            <div class="box-header with-border">
                <div class="row">
                    <div class="col-md-12">
                        <div class="container123  col-md-6"   style="">
                            <h4></h4>
                            <table class="table table-bordered">
                                <thead>
                                <tr>
                                    <th >Thông tin khách hàng</th>
                                    <th ></th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr >
                                    <td>Thông tin người đặt hàng</td>
                                    <td >{{ $orders->customers->first_name }} {{ $orders->customers->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Order date</td>
                                   <td>{{$orders->transaction_date}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Địa chỉ</td>
                                  <td >{{ $orders->customers->postal_address }} </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                  <td >{{ $orders->customers->physical_address }} </td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                   <td >{{ $orders->customers->email }} </td>
                                </tr>
                                <tr>
                                    <td>Ghi chú</td>
                                    <td > {{ $orders->status }}</td>
                                    
                                </tr>
                                </tbody>
                            </table>
                        </div>
                        <table id="myTable" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                            <thead>
                            <tr role="row">
                                <th  >STT</th>
                                <th >Tên sản phẩm</th>
                                <th >Số lượng</th>
                                <th>Giá tiền</th>
                            </thead>
                            <tbody>
                            @foreach($orders_details as $key => $orders_details)
                            <tr>
                            	 <td>{{ $key+1 }}</td>
                            	  <td>{{ $orders_details->product->product_name }}</td>
                            	   <td>{{ $orders_details->quantity  }}</td>
                            	   <td>{{ $orders_details->price  }}</td>
                            </tr>	   
                            @endforeach
                            <tr>
                                <td colspan="3"><b>Tổng tiền</b></td>
                                <td >{{$orders->total_amount}}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="col-md-12">
                {{ Form::model($orders,['route' => ['order.update',$orders->id ],'method' => 'put']) }}
                    
                    {{ csrf_field() }}
                    <div class="col-md-8"></div>
                    <div class="col-md-4">
                        <div class="form-inline">
                            <label>Trạng thái giao hàng: </label>
                            <select name="status" class="form-control input-inline" style="width: 200px">
                                <option value="Chưa giao">Chưa giao</option>
                                <option value="Đang giao">Đang giao</option>
                                <option value="Đã giao">Đã giao</option>
                            </select>

                            <input type="submit" value="Cập nhập" class="btn btn-primary">
                        </div>
                    </div>
                   {{ Form::close() }}
                </div>
            </div>
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