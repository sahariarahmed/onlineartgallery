@extends('website.welcome')

@section('content')


@foreach ($data as $item)
<br>

		<div class="container">
			<div class="row text-center">
				<div class="col mt-5">
			<img style="border-radius: 4px;" height="35%;", width="45%;"
				src=" {{url('/uploads/blog/'.$item->image)}}" alt="blog">

			    <h3>{{$item->title}}</h3>
                <h4>{{$item->moto}}</h4>
				<p> by "{{$item->fullname}}"</p>
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
