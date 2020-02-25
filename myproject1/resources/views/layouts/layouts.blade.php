<!DOCTYPE html>
<html lang="en">

<head>

  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">

   <title>
    @yield('title')
  </title>

  <!-- Bootstrap core CSS -->
  <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" rel="stylesheet">
  <!-- Custom styles for this template -->
  <link href="css/shop-item.css" rel="stylesheet">

</head>

<body>

  <!-- Navigation -->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
     <a class="navbar-brand" href="{{route('index')}}">PHP LARAVEL</a>
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
                <a class="nav-link" href="{{route('customer.edit',Auth::user()->id)}}" title="">{{Session::get('user')}}</a> 
              
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
       @yield('content')
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

</body>

</html>
