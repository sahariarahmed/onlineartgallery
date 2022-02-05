@extends('website.welcome')

@section('content')



		<div class="container">
			<div class="row text-center">
				<div class="col mt-5">
			<img style="border-radius: 4px;" height="35%;", width="45%;"
				src=" {{url('/uploads/artists/'.$view->image)}}" alt="artist">

			    <h3>Artist Name: {{$view->user->name}}</h3>
                <h4>Email: {{$view->user->email}}</h4>
				<p>Contact no: {{$view->contact}}</p>
				<p>This artist is from: {{$view->city}} , {{$view->country}}</p>


				</div>
			</div>
		</div>
        <br><br><br>


@endsection
