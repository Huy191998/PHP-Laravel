@extends('layouts.main')
@section('title','Show brands')
@section('content')
	<br>
<div class="container">
	<p>{{$brands->name}}</p>
	<p>{{$brands->description}}</p>
</div>

@endsection