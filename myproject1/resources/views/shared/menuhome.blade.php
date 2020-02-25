 <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">
    <div class="container">
      <a class="navbar-brand" href="#">PHP LARAVEL</a>
      <div class="col-7 ">
      {{ Form::open(['route' => 'customer.store', 'method' => 'post']) }}
      {{ Form::text('value','',['class'=>'form-control col-5','style'=>'float: left']) }}
      {{form::submit('Tìm',['class'=>'btn btn-primary','style'=>'float: left']) }}
      {{ Form::close() }}
      </div>
       
      <div class="collapse navbar-collapse" id="navbarResponsive">
        <ul class="navbar-nav ml-auto">
          <li class="nav-item active">
            <a class="nav-link" href="{{route('index')}}">Trang chủ
              <span class="sr-only">(current)</span>
            </a>
          </li>
         
          <li class="nav-item">
            <a class="nav-link" href="{{route('cart.index')}}" title=""><i class="fa fa-shopping-cart"></i> ({{Cart::count()}})</a>
          </li>
         @if(Session::has('user') )
          <li class="nav-item">
               <a class="nav-link" href="{{route('customer.edit',Auth::user()->id)}}" title="">{{Session::get('user')}} </a><p></p> 
          
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