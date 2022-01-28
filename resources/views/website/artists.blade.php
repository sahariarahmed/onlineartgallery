<style>
    .cards {
      box-shadow: 0 4px 8px 0 rgba(204, 16, 16, 0.829);
      transition: 0.3s;
      width: 100%;
      border-radius: 10px;
      height: 445px;
      background: rgba(255, 255, 255, 0.897);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }
    .card-containers {
      display: grid;
      margin-right: 2rem;
      grid-template-columns: 33.33% 33.33% 33.33%;
      grid-gap: 15px;

  }
  </style>


@extends('website.welcome')

@section('content')

<br><br>

<div class="card-containers">
@foreach ($data as $item)

<div class="cards">
    <a href="{{route('view.artist',$item->id)}}">
        <div>
			<img style="border-radius: 4px;" height="240px" width="410px;"
				src=" {{url('/uploads/artists/'.$item->image)}}" alt="artist">
        </div>

			<h2>{{$item->fname}} {{$item->lname}}</h2>
				<p>{{$item->country}}</p>
				<p>{{$item->email}}</p>
			<br><br><br>
    </a>
</div>

@endforeach
</div>
@endsection
