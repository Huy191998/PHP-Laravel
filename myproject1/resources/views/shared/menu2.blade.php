<div class="list-group">
          @foreach( $categories as $key => $categories )
          <a href="{{route('indexcategories',[$categories->id])}}" class="list-group-item">{{$categories->name}}</a>
          
          @endforeach
        </div>