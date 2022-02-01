@extends('website.welcome')
@section('content')
  <div class='container'> <br><br>
    <div class="row text-center">
      <div class="col mt-5">


    <img style="border-radius: 10px;" height="280px" width="400px;" src={{url('/uploads/courses/'.$course->image)}} alt="course">
<h3>Course Name: "{{$course->name}}"</h3>
<h6> Price: {{$course->price}} BDT</h6>
<h5>About the course: {{$course->details}} </h5>
<form action="{{route('enroll.course',$course->id)}}" method="post">
  @csrf
  @if ($rule==true)
  <button type="submit" class="btn btn-warning">Enrolled</button>
  @else
  <button type="submit" class="btn btn-success">Enroll</button>
  @endif


</form>



{{--
<br><br><br><br> --}}

</div>
</div>
</div>
</div>
@endsection
