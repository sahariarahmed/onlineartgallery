@extends('welcome')

@section('content')


<p><th>   
    <img style="border-radius: 10px;" height="120px" width="160px;" src={{url('/uploads/blog/'.$details->image)}} class="img-responsive" alt="artist">
  </th></p>
<p>Title:       {{$details->title}}</p>
<p>Moto:        {{$details->moto}}</p>
<p>Name:        {{$details->fullname}}</p>
<p>Email:       {{$details->email}}</p>
<p>Details:     {{$details->description}}</p>



@endsection