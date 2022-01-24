@extends('website.welcome')

@section('content')



		<div class="container">
			<div class="row text-center">
				<div class="col mt-5">
			<img style="border-radius: 4px;" height="35%;", width="45%;"
				src=" {{url('/uploads/artists/'.$view->image)}}" alt="artist">

			    <h3>{{$view->fname}} {{$view->lname}}</h3>
                <h4>{{$view->email}}</h4>
				<p>{{$view->contact}}</p>
				<p>{{$view->country}}</p>
				<p>{{$view->city}}</p>

				</div>
			</div>
		</div>
        <br><br><br>


@endsection
