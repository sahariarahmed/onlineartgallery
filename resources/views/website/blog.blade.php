@extends('website.welcome')

@section('content')


@foreach ($data as $item)
<br>    
	
		<div class="container">
			<div class="row text-center">				
				<div class="col mt-5">
			<img style="border-radius: 4px;" height="280px" width="400px;" 
				src=" {{url('/uploads/blog/'.$item->image)}}" alt="blog">

			    <h1>{{$item->title}}</h1>
                <h3>{{$item->moto}}</h3>
				<p>{{$item->fullname}}</p>
				<p>{{$item->email}}</p>
                <h4>{{$item->description}}</h4>
				<h5><a class='btn btn-success' href="{{route('view.blog',$item->id)}}">View</a></h5>
				
				<button disabled="disabled"></button>
				<button disabled="disabled"></button>
				<button disabled="disabled"></button>
			
				</div>
			</div>
		</div>
        <br><br><br>
	
@endforeach

@endsection