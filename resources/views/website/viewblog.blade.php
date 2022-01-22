@extends('website.welcome')

@section('content')
  <div class='container'> <br><br>
    <div class="row text-center">
      <div class="col mt-5">


    <img style="border-radius: 10px;" height="280px" width="400px;" src={{url('/uploads/blog/'.$view->image)}} alt="blog">
<h3>Course Name: "{{$view->title}}"</h3>
<h3>Course Name: "{{$view->moto}}"</h3>
<h6> Price: {{$view->fullname}} BDT</h6>
<h5>About the course: {{$view->description}} </h5>




<br><br><br><br>

</div> 
</div> 
</div> 
</div> 
@endsection
