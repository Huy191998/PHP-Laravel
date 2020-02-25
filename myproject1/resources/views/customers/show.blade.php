@extends('layouts.main')
@section('title','Thông tin khách hàng')
@section('content')

<div class="content">
        
        <div class="row">
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
              	
                <h5 class="card-title">Thông tin khách hàng</h5>
                
              </div>
             <div class="card-body ">
				<table class="table table-bordered">
                                <thead>
                                
                                </thead>
                                <tbody>
                                <tr >
                                    <td>Thông tin người đặt hàng</td>
                                    <td >{{ $customers->first_name }} {{ $customers->last_name }}</td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                   <td>{{$customers->email}}</td>
                                </tr>
                                
                                <tr>
                                    <td>Mã bưu điện</td>
                                  <td >{{ $customers->postal_address }} </td>
                                </tr>
                                <tr>
                                    <td>Địa chỉ</td>
                                  <td >{{ $customers->physical_address }} </td>
                                </tr>
                              
                                </tbody>
                            </table>
                        </div>
				
		
					<a style="margin: 10px;" href="{{route('customer.index')}} "class="btn btn-success col-2">Trở về</a>

	
	          
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