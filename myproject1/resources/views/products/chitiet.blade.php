<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Chi tiết sản phẩm</title>

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
      <a class="navbar-brand" href="#">Start Bootstrap</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('index')}}">Home
              <span class="sr-only">(current)</span>
            </a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">About</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{route('index')}}">Services</a>
          </li>
            <li class="nav-item">
            <a class="nav-link" href="{{route('cart.index')}}" title=""><i class="fa fa-shopping-cart"></i> ({{Cart::count()}})</a>
          </li>
          @if(Session::has('user') )
          <li class="nav-item">
                <a class="nav-link" href="{{route('customer.edit',Auth::user()->id)}}" title=""></a> 
          
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

    <div class="row">

      <div class="col-lg-3">
        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          @foreach( $categories as $key => $categories )
          <a href="#" class="list-group-item">{{$categories->name}}</a>
          
          @endforeach
        </div>
      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

       <div class="demoslide">
         @foreach(json_decode($product->images,true) as $ka =>$image)
          <img  style=" width: 60%;height: 300px; margin-top: 20px"  class="" src="{!! asset("/img/$image") !!}"   >

          @endforeach 
   <!--  <img src="images/1.jpg" width='500px' height='200px'>
    <img src="images/2.jpg" width='500px' height='200px'>
    <img src="images/3.jpg" width='500px' height='200px'>
    <img src="images/4.jpg" width='500px' height='200px'>
    <img src="images/5.jpg" width='500px' height='200px'> -->
  </div>
          <div class="card-body">
            <h3 class="card-title">{{$product->product_name}}</h3>
            <h4>${{$product->price}}</h4>
             <p>{{$product->brands->name}}</p>
            <p class="card-text">{{$product->description}}</p>
            
            <div class="col-12" style="float: left;margin-top: 10px">
              
            <a style="margin-bottom: 30px" href="{{route('addCart',['id'=>$product->id])}}"  class="btn btn-success">Thêm vào giỏ hàng <i class="fa fa-cart-plus"></i></a>
            </div>
           
          </div>
          
        </div>
         
        <!-- /.card -->

        
        <!-- /.card -->

      </div>
      <!-- /.col-lg-9 -->

    </div>

  </div>
  <!-- /.container -->

  <!-- Footer -->
  <footer class="py-5 bg-dark">
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
$(function() {
  $('.demoslide img:gt(0)').hide();
  setInterval(function(){
      $('.demoslide :first-child').fadeOut() //FadeOut là ảnh đang hiện
      .next('img').fadeIn() //fadeIn ảnh tiếp theo
      .end().appendTo('.demoslide'); // chuyển vị trí ảnh xuống cuối
    }, 5000);
})

</script>
</body>

</html>
