@extends('layouts.main')
@section('title','Danh sách sản phẩm')
@section('content')


		
	<div class="content">
        
        <div class="row">
        	
			
          <div class="col-md-12">
            <div class="card ">
              <div class="card-header ">
             
                <h5 class="card-title">Quản lý sản phẩm</h5>
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
                 	<a style="margin: 10px" href="{{route('product.create')}} "class="btn btn-success">Tạo sản phẩm</a>	
                
              </div>
              <div class="card-body ">
                
				{{ Form::open(['route' => ['product.index' ],'method' => 'get']) }}
		
		<div class="form-group col-6" style="float: left;">
			{{ Form::label('Loại sản phẩm :')}}
				<select style="float: left;" class="form-control" name="seachbrand">
   
			
			    <option value="null">Brand</option>
					  	@foreach ($brands as $key => $brands)
					    <option value="{{$brands->id}}" > 
					        {{ $brands->name }} 
					    </option>
					  @endforeach    
		</select>
		{{form::submit('Tìm kiếm',['class'=>'btn btn-danger','style'=>'float: left']) }}
		</div>
		<div class="form-group col-6" style="float: left;">
			{{ Form::label('Tên sản phẩm :')}}
			{{ Form::text('seachname','',['class'=>'form-control ','style'=>'float: left']) }}
		</div>
		
				
				
				{{ Form::close() }}
	<table class="table ">
		<thead>
			<th style="text-align:center;">STT</th>
			<th style="text-align:center;">Tên sản phẩm</th>
			<th style="text-align:center;">Loại sản phẩm</th>
			<th style="text-align:center;">Mô tả</th>
			<th style="text-align:center;">Hình ảnh</th>
			<th >Thao tác</th>
		</thead>
		<tbody style="margin-top: 100px">

			@foreach( $products as $key => $products )
			<tr  >
				<td style="text-align:center;">{{ ++$key }}</td>

				<td style="text-align:center;">{{Str::limit($products->product_name,15,'...')  }}</td>	
				<td style="text-align:center;">{{ $products->brands->name }}</td>	
				<td style="text-align:center;">{{ Str::limit($products->description,10,'...') }}</td>
				<td> 
					@foreach(json_decode($products->images,true) as $ka =>$image)
					<img  style="z-index:{{++$ka}};position: absolute; width: 70px;height: 40px;margin-top: -20px;margin-left: 30px"  class="card-img-top" src="{!! asset("/img/$image") !!}"   >

					@endforeach
					

			
				</td>
				<td >

				
				<a href="{{route('product.edit',$products->id)}}" style="float: left;margin-right: 10px" class="btn btn-primary">Sửa</a>
				{{ Form::open(['route' => ['product.destroy',$products->id ],'method' => 'Delete']) }}
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
