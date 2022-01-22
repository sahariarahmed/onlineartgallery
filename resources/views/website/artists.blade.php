@extends('website.welcome')

@section('content')

<br><br>
@foreach ($data as $item)
    
	
		<div class="container">
			<div class="row text-center">
				<div class="col mt-5">
			<img style="border-radius: 4px;" height="280px" width="400px;" 
				src=" {{url('/uploads/artists/'.$item->image)}}" alt="artist">

			<h2>{{$item->fname}} {{$item->lname}}</h2>
				<p>{{$item->country}}</p>
				<p>{{$item->email}}</p>
			<br><br><br>

			</div>
			</div>
		</div>
	
@endforeach

@endsection