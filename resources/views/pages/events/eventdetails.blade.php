@extends('welcome')


@section('content')

<p><th>
    <img style="border-radius: 10px;" height="120px" width="160px;" src={{url('/uploads/events/'.$details->image)}} class="img-responsive" alt="events">
  </th></p>
  <p><b>Event Title:</b>  {{$details->title}}</p>
  <p><b>Starting Date:</b>   {{$details->sdate}}</p>
  <p><b>Ending Date:</b>       {{$details->edate}}</p>
  <p><b>Event Owner:</b>     {{$details->name}}</p>
  <p><b>Event place:</b>     {{$details->place}}</p>
  <p><b>Email:</b>     {{$details->email}}</p>
  <p><b>Description: </b>       {{$details->description}}</p>


@endsection
