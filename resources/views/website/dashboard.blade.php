@extends('website.welcome')
@section('content')
<div class="container">

<br>

    @foreach ($latestcats as $item)

    <div class="text-center">
        <a href="{{route('show.cat',$item->id)}}">
            <div class="containers">

                <div class="centered"> <p style="font-family:Algerian; font-size:40px; color:rgb(0, 0, 0)" >{{$item->name}}</p>
                <h4>created by: {{$item->user->name}}</h4>
            </div>
            </div>
        <img style="border-radius: 15px;" width="480px;" height="340px;" src={{url('/uploads/galleries/'.$item->image)}} class="card-img" alt="arts">



        </a>
        </div><hr>
        <br><br>
    @endforeach



</div>
<br>
<div class="text-center">
{{-- <button type="button" class="btn btn-primary" href="{{route('show.cat',$item->id)}}">See more</button> --}}
<a class='btn btn-primary' href="{{route('show.cats',$item->id)}}">See more</a>
</div>
<br><br>
@endsection
