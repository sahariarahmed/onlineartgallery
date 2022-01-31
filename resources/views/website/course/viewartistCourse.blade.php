@extends('website.welcome')

@section('content')
<div class="container">
{{-- pop up --}}
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif

@if(session()->has('delete'))
    <p class="alert alert-danger">
        {{session()->get('delete')}}
    </p>
@endif

@if(session()->has('update'))
    <p class="alert alert-success">
        {{session()->get('update')}}
    </p>
@endif
    <h2 class="text-center">Your Courses</h2>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Image</th>
      <th scope="col">Course Name</th>
      <th scope="col">Price</th>
      <th scope="col">Details</th>
      <th scope="col">Enrolled List</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

@foreach ($data as $key=>$item)
    <tr>
      <td>{{$key+1}}</td>
      <th>
        <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/courses/'.$item->image)}} class="img-responsive" alt="course">
      </th>

      <td>{{$item->name}}</td>
      <td>{{$item->price}} BDT</td>
      <td>{{$item->details}}</td>
      <td> <a class='btn btn-outline-success' href="{{route('artist.enroll.list',$item->id)}}">LIST</a> </td>
      <td>
        {{-- <a class='btn btn-primary' href="{{route('details.course',$item->id)}}">DETAILS</a> --}}
        <a class='btn btn-danger' href="{{route('deleting.course',$item->id)}}">DELETE</a>
        <a class='btn btn-warning' href="{{route('updating.course',$item->id)}}">UPDATE</a>
      </td>

    </tr>
@endforeach

  </tbody>
</table>

</div>
@endsection
