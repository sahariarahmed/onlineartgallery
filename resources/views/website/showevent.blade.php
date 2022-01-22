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
</style>



@extends('website.welcome')
@section('content')


<div class="containers">
    <img style="height:50%; width:100%" src={{url('/uploads/events/'.$view->image)}} alt="event">
    <div class="centered"><h1>{{$view->title}}</h1>
    </div>
</div>
<div class="container">

<h2>This Event has been hosted by "<u>{{$view->name}}</u>".</h2><br><br>
<h3>Event time: <b><u>{{$view->sdate}}</u></b> to <b><u>{{$view->edate}}</u></b>.</h3>
<br><br>
<h2>Details:</h2>
<div class="h10">{{$view->description}} </div>




<br><br><br><br>
<div class="row text-center"><h6>To contact with the host you can use this mail: <u>{{$view->email}}</u></h6>
</div>
</div>
</div>
</div>
<br>
@endsection
