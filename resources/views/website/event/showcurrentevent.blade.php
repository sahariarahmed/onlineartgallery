<style>
.containers {
    position: relative;
    text-align: center;
    color: white;
}
.centered {
    position: absolute;
    top: 60%;
    left: 50%;
    transform: translate(-50%, -50%);
}
.h10 {
    display: block;
    font-size: 1.5em;
    font-style: italic;
    margin-top: 0.67em;
    margin-bottom: 0.67em;
    margin-left: 0;
    margin-right: 0;
    font-weight: bold;
}
.cards {
    box-shadow: 0 4px 8px 0 rgba(247, 247, 247, 0.829);
    transition: 0.3s;
    width: 100%;
    margin-right: 20px;
    border-radius: 10px;
    height: 445px;
    background: rgba(255, 252, 252, 0.897);
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
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        text-decoration: none;
        color: rgb(255, 244, 244);
        transform: scale(1.2);
    }
</style>


@extends('website.welcome')
@section('content')

    <div class="containers">
        <img style="height:50%; width:100%" src={{url('/uploads/events/'.$view->image)}} alt="event">
        <div class="centered"><h1>{{$view->title}}</h1>
        </div>
    </div>

    <div class="container">
    <h4>This Event has been hosted by "<u>{{$view->name}}</u>".</h4><br><br>
    <h3>Event time: <b><u>{{$view->sdate}}</u></b> to <b><u>{{$view->edate}}</u></b>.</h3>
    <h5>This event is helding at "{{$view->place}}"</h5>
    <br><br>
    <h2>Details:</h2>
    <div class="h10">{{$view->description}} </div><br><br>


    <div class="card-containers">
    @foreach (explode('|', $view->images) as $image)
    <div class="cards">
    <a>
    <img style="height:100%; width:100%" src={{url('/uploads/events/'.$image)}} alt="event">
    </a>
    </div>
        @endforeach
    </div>



    <br><br><br><br>
    <div class="row text-center"><h6>To contact with the host you can use this mail: <u>{{$view->email}}</u></h6>
    </div>
    </div>

<br>
@endsection
