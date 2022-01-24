@extends('website.welcome')

@section('content')
  <div class='container'> <br>
    <div class="row text-center">

    <img style="border-radius: 10px;" height="35%" width="55%;" src={{url('/uploads/blog/'.$view->image)}} alt="blog">
<h1><u>{{$view->title}}</u></h1>
<h6> By {{$view->fullname}} </h6>

<h4> MOTO: "{{$view->moto}}"</h4>
</div>


<h3>Details: </h3>
<h3>{{$view->description}} </h3>


<br><br><br><br>

</div>
</div>
@endsection
