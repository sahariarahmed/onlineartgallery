@extends('website.welcome')
@section('content')


<div class="container">


@foreach ($images as $item)
<img style="border-radius: 15px;" width="340px;" height="340px;" src={{url('/uploads/'.$item->image)}} class="card-img" alt="arts">



@endforeach
</div>
@endsection
