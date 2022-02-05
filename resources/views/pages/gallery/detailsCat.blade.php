@extends('welcome')
@section('content')
<link rel="stylesheet" href="/uploads/bootstrap.min.css">
@if(session()->has('warning'))
    <p class="alert alert-warning">
        {{session()->get('warning')}}
    </p>
@endif


  <p><b>Description: </b>       {{$details->details}}</p>
  <p><th><b><div class="text-center">Arts:</div></b>
<br>
@foreach ($images as $item)

<img style="border-radius: 5px;" width="370px;" height="340px;" src={{url('/uploads/'.$item->image)}} class="card-img" alt="arts">

<a class='btn btn-outline-danger' href="{{route('delete.singleimage',$item->id)}}">DELETE</a>
{{-- <a class='btn btn-outline-primary' href="{{route('addforsale', $item->id)}}">Add for sale</a> --}}
@endforeach


    </th></p>


@endsection


