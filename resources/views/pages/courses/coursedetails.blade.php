@extends('welcome')


@section('content')

<p><th>
    <img style="border-radius: 10px;" height="120px" width="160px;" src={{url('/uploads/courses/'.$details->image)}} class="img-responsive" alt="course">
  </th></p>
<h3>Name:{{$details->name}}</h3>
<h3>Price:{{$details->price}}</h3>
{{-- <h3>Starting Date:</h3>
<h3>Total Enrolled:</h3> --}}
<h3>Details:{{$details->details}}</h3>


@endsection
