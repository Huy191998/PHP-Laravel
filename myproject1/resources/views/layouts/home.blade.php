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
  <link href="{{asset('css/shop-homepage.css')}}">

</head>

<body>

  <!-- Navigation -->
  @include('shared.menuhome')

  <!-- Page Content -->
  <div class="container">

    <div class="row" style="margin-top: 50px">
    

      <div class="col-lg-3">

        <h1 class="my-4">Shop Name</h1>
        <div class="list-group">
          @foreach( $categories as $key => $categories )
          <a href="{{route('indexcategories',[$categories->id])}}" class="list-group-item">{{$categories->name}}</a>
          
          @endforeach
        </div>

      </div>
      <!-- /.col-lg-3 -->

      <div class="col-lg-9">

        <div id="carouselExampleIndicators" class="carousel slide my-4" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
          </ol>
          <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
              <img style="height: 320px;width: 100%" class="d-block img-fluid" src="https://i.ytimg.com/vi/yIU2yULeC7I/hqdefault.jpg" alt="First slide">
            </div>
            <div class="carousel-item">
              <img style="height: 320px;width: 100%" class="d-block img-fluid" src="https://cdn.trangcongnghe.com/uploads/posts/2019-08/smartphone-galaxy-a10s-lo-anh-poster-ch237nh-thuc-sap-sua-tien-ra-thi-truong-2.jpg" alt="Second slide">
            </div>
            <div class="carousel-item">
              <img style="height: 320px;width: 100%" class="d-block img-fluid" src="https://cdn.tgdd.vn/Files/2017/01/13/937303/dmx-samsung-sis-760-367.png" alt="Third slide">
            </div>
          </div>
          <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
          </a>
          <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
          </a>
        </div>
        @yield('content')
        
        <!-- /.row -->

      </div>
      <!-- /.col-lg-9 -->

    </div>
    <!-- /.row -->

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
