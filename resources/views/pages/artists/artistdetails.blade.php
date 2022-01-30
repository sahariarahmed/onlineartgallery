@extends('welcome')


@section('content')

<div class="text-center">
<p><th>
    <img style="border-radius: 10px;" height="120px" width="160px;" src={{url('/uploads/artists/'.$details->image)}} class="img-responsive" alt="artist">
  </th></p>
<p>Name:  {{$details->user->name}}</p>
<p>Email:   {{$details->user->email}}</p>
<p>Contact:     {{$details->contact}}</p>
<p>Country:     {{$details->country}}</p>
<p>City:        {{$details->city}}</p>

</div>

@endsection

