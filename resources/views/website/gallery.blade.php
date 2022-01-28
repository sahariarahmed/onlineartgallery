<style>
    .cards {
      /* box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.829); */
      transition: 0.3s;
      width: 100%;
      border-radius: 10px;
      height: 445px;
      /* background: rgba(4, 0, 255, 0.329); */
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }
    .card-containers {
      display: grid;
      grid-template-columns: 33.33% 33.33% 33.33%;
      grid-gap: 15px;

  }
  .centered {
  position: relative;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
}
.containers {
  position: relative;
  text-align: center;
  /* color: white; */
}

  </style>

@extends('website.welcome')


@section('content')

<div class="container">
    <div class="row text-center">
        <h1>Categories of Arts</h1>
    </div>
<br>

    <div class="card-containers">
@foreach ($data as $item)

<div class="cards">
    <a href="{{route('show.cat',$item->id)}}">
        <div class="containers">
            <div class="centered"><h3>{{$item->name}}</h3></div>
        </div>
    <img style="border-radius: 15px;" width="340px;" height="340px;" src={{url('/uploads/galleries/'.$item->image)}} class="card-img" alt="arts">

        {{-- <h4>[{{$item->details}}]</h4> --}}

    </a>
    </div>
@endforeach


</div>
</div>
</div>
<br><br>
@endsection
