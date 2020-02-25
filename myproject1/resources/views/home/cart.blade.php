<div class="page-head_agile_info_w3l">

  </div>
  <!-- //banner-2 --><!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Giỏ hàng</title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="{{asset('css/shop-item.css')}}" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">PHP LARAVEL</a>
      <div class="col-6">
      {{ Form::open(['route' => 'seach', 'method' => 'post']) }}
      {{ Form::text('value','',['class'=>'form-control col-5','style'=>'float: left']) }}
      {{form::submit('Tìm',['class'=>'btn btn-primary','style'=>'float: left']) }}
      {{ Form::close() }}
      </div>
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('index')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          
         
           <li class="nav-item">
            <a class="nav-link" href="{{route('cart.index')}}" title=""><i class="fa fa-shopping-cart"></i> ({{Cart::count()}})</a>
          </li>
          @if(Session::has('user') )
          <li class="nav-item">
               <a class="nav-link" href="{{route('logout')}}" title="">{{Session::get('user')}} </a><p></p> 
          
          </li>
            <li class="nav-item">
              
            <a class="nav-link" href="{{route('logout')}}" title="">Đăng xuất </a>
          </li>
           @else
          <li class="nav-item">
            <a class="nav-link" href="{{route('login')}}" title="">Đăng nhập </a>
          </li>
          @endif
        </ul>
      </div>
    </div>
  </nav>

  <!-- Page Content -->
  <div class="container">

    <div class="page-head_agile_info_w3l">

  </div>
  <!-- //banner-2 -->
  <!-- page -->
  <div class="services-breadcrumb">
    
  </div>
  <!-- checkout page -->
  <div class="privacy py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
      <!-- tittle heading -->
      
      <!-- //tittle heading -->
      
      
 
          
            
      <br>

      <div class="checkout-right">
        <h4 class="mb-sm-4 mb-3">Giỏ hàng của bạn</span>
        </h4>
        <div class="table-responsive">
          <table class="table table-bordered ">
            <thead>
              <tr>
                <th>STT</th>
                <th>Hình Ảnh</th>
                <th>Số Lượng</th>
                <th>Tên Sản Phẩm</th>
                <th>Đơn Giá</th>
                <th>Chỉnh Sửa</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;?>
              @foreach($cart as $value)
                <tr class="rem1">
                  <td class="invert">{{ $i }}</td>
                  <td class="invert-image">
                    <a href="#">
                      @foreach(json_decode($value->options->img,true) as $ka =>$image)
                        <img  style="z-index:{{++$ka}};position: absolute; width: 70px;height: 40px"  class="card-img-top" src="{!! asset("/img/$image") !!}"   >

                        @endforeach
                      
                    </a>
                  </td>
                  <td class="invert">
                    <div class="quantity">
                      <div class="form-group">
                       {{ Form::model($value,['route' => ['cart.update',$value->rowId ],'method' => 'put']) }}
                       {!! Form::hidden('qyt', $value->qty) !!}
                       {!! Form::hidden('cong','1') !!}
                        {{form::submit('+',['class'=>'btn btn-secondary','style'=>'float: left']) }}
                       {{ Form::close() }}
                        <input type="number" style="float: left;" name="qty" class="form-control col-3 qty" value="{{ $value->qty }}" min='1' data-id="{{ $value->rowId }}">
                        {{ Form::model($value,['route' => ['cart.update',$value->rowId ],'method' => 'put']) }}
                            {!! Form::hidden('qyt', $value->qty) !!}
                       {!! Form::hidden('tru','1') !!}
                        {{form::submit('-',['class'=>'btn btn-secondary','style'=>'float: left']) }}
                       {{ Form::close() }}
                      </div>
                    </div>
                  </td>
                  <td class="invert">{{ $value->name }} </td>
                  <td class="invert">{{ number_format($value->price) }} VNĐ</td>
                  <td s class="invert">
                    <div class="rem" style="margin-right: 36px">
                      {{ Form::open(['route' => ['cart.destroy', $value->rowId ],'method' => 'Delete']) }}
                          {{form::submit('Delete',['class'=>'btn btn-danger','style'=>'float: left']) }}
                      {{ Form::close() }}
                      <!-- <div class="close1" data-id="{{ $value->rowId }}">x
                      </div> -->
                    </div>
                  </td>
                </tr>
                <?php $i++; ?>
              @endforeach 
            </tbody>
          </table>
          <h4 class="mb-sm-4 mb-3" style="margin-top: 15px;" align="right">Bạn cần thanh toán tổng cộng:
            <span>{{ Cart::total() }} VND</span>
          </h4>
        </div>
      </div>
     
      {{ Form::open(['url' => '/thanhtoan', 'method' => 'post']) }}
      <div class="form-group {{ $errors->has('customer_id') ?'has-error':'' }}" style="display: none;">
              {{ Form::label('Khách Hàng: ','',['class' => 'font-weight-bold']) }}
              {{ Form::select('customer_id',$customer, null,['class' => 'form-control'])}}
              <span class="text-danger">{{$errors->first('customer_id')}}</span>
          </div>
          
            
      <br>

      <div class="checkout-right" style="display: none;">
        <h4 class="mb-sm-4 mb-3">Bạn có tổng cộng:
          <span>{{ Cart::count() }} sản phẩm</span>
        </h4>
        <div class="table-responsive">
          <table class="timetable_sub">
            <thead>
              <tr>
                <th>STT</th>
                <th>Hình Ảnh</th>
                <th>Số Lượng</th>
                <th>Tên Sản Phẩm</th>
                <th>Đơn Giá</th>
                <th>Chỉnh Sửa</th>
              </tr>
            </thead>
            <tbody>
              <?php $i = 1;?>
              @foreach($cart as $value)
                <tr class="rem1">
                  <td class="invert">{{ $i }}</td>
                  <td class="invert-image">
                    <a href="#">
                      <img style="height: 60px;width: 60px" class="img-responsive" src="images/{{ $value->options->img }}"  alt="{{ $value->name }}">
                    </a>
                  </td>
                  <td class="invert">
                    <div class="quantity">
                      <div class="form-group">
                        <input type="number" name="qty" class="form-control qty" value="{{ $value->qty }}" min='1' data-id="{{ $value->rowId }}">
                      </div>
                    </div>
                  </td>
                  <td class="invert">{{ $value->name }} </td>
                  <td class="invert">{{ number_format($value->price) }} VNĐ</td>
                  <td s class="invert">
                    <div class="rem" style="margin-right: 36px">
                      <div class="close1" data-id="{{ $value->rowId }}"></div>
                    </div>
                  </td>
                </tr>
                <?php $i++; ?>
              @endforeach 
            </tbody>
          </table>
          <h4 class="mb-sm-4 mb-3" style="margin-top: 15px;" align="right">Bạn cần thanh toán tổng cộng:
            <span>{{ Cart::total() }} VND</span>
          </h4>
        </div>
      </div>

  {{form::submit('Thanh Toán',['class'=>'font-weight-bold text-white btn btn-primary mt-3','style'=>'float:left']) }}
  <a style="float: left; margin: 10px;margin-top: 15px" href="{{route('index')}} "class="btn btn-success">Trở về</a>

  {{ Form::close() }}
  </div>
  <!-- /.container -->
</div>
</div>
  <!-- Footer -->
  <footer class="py-5 bg-dark" >
    <div class="container">
      <p class="m-0 text-center text-white">Copyright &copy; Your Website 2019</p>
    </div>
    <!-- /.container -->
  </footer>

  <!-- Bootstrap core JavaScript -->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
   <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
<script type="text/javascript">


</script>
</body>

