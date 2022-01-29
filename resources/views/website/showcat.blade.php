@extends('website.welcome')
@section('content')
<div class="container">
<br>


<h5>Details: </h5>
<h4>[{{$view->details}}]</h4>

@foreach ($images as $item)

<img style="border-radius: 5px;" width="370px;" height="340px;" src={{url('/uploads/'.$item->image)}} class="card-img" alt="arts">

@endforeach


<br><br>
</div>
@endsection
