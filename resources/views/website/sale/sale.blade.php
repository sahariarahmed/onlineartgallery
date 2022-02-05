@extends('website.welcome')

@section('content')


@foreach ($data as $item)

<img style="border-radius: 5px;" width="370px;" height="340px;" src={{url('/uploads/'.$item->image)}} class="card-img" alt="arts">

@endforeach


@endsection
