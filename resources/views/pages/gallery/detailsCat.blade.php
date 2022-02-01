@extends('welcome')


@section('content')


  <p><b>Description: </b>       {{$details->details}}</p>
  <p><th><b><div class="text-center">Arts:</div></b>
<br>
{{-- @foreach ($images as $item)

<img style="border-radius: 5px;" width="370px;" height="340px;" src={{url('/uploads/'.$item->image)}} class="card-img" alt="arts">

@endforeach --}}

    </th></p>


@endsection
