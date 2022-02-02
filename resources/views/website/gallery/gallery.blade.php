<style>
    .cards {
      box-shadow: 0 4px 8px 0 rgba(146, 142, 142, 0.829);
      transition: 0.3s;
      width: 100%;
      border-radius: 10px;
      height: 475px;
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
        <h2><u>Categories of Art</u></h2>
    </div>
<br>

    <div class="card-containers">
@foreach ($data as $item)

<div class="cards">
    <a href="{{route('show.cat',$item->id)}}">
        <div class="containers">
            <div class="centered">
                <p style="font-family:Gill Sans MT Condensed; font-size:30px; color:rgb(0, 0, 0)" ><b>{{$item->name}}</b></p>
                <p style="font-family:Pristina; font-size:15px; color:rgb(0, 0, 0)" >by: {{$item->user->name}}</p>
            </div>
        </div>
        <img style="border-radius: 5px;" width="340px;" height="340px;" src={{url('/uploads/galleries/'.$item->image)}} class="card-img" alt="arts">
    </a>
    </div>
@endforeach


</div>
</div>
</div>
<br><br>
@endsection
