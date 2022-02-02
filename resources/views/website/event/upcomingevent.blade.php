<style>
    .cards {
      box-shadow: 0 4px 8px 0 rgba(204, 16, 16, 0.829);
      transition: 0.3s;
      width: 100%;
      border-radius: 10px;
      height: 445px;
      background: rgba(255, 255, 255, 0.514);
      display: flex;
      flex-direction: column;
      justify-content: center;
      align-items: center;
  }
    .card-containers {
      display: grid;
      background-image: url('/uploads/img1.jpg');
      grid-template-columns: 33.33% 33.33% 33.33%;
      grid-gap: 15px;

  }
  </style>


  @extends('website.welcome')
  @section('content')


  <div class="card-containers">
  @foreach ($data as $item)

      <div class="cards">
      <a href="{{route('show.event',$item->id)}}">
      <div>
      <img style="border-radius: 10px;" width="180px;" height="150px;" src={{url('/uploads/events/'.$item->image)}} class="card-img" alt="events">
      </div>

      <div class="row text-center">
          <br>
        <p style="font-family:Britannic Bold; font-size:32px; color:rgb(0, 0, 0)" ><b>{{$item->title}}</b></p>
      <h4>[{{$item->sdate}}]  <b><u>to</u></b>  [{{$item->edate}}]</h4>
      <br><br><br>
      </a>
      </div>
      </div>
  @endforeach
  </div>
  @endsection

