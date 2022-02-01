@extends('welcome')

@section('content')
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



    <a href="{{route('course.create')}}" class="btn btn-primary stretched-link pl-2">Create New Courses</a>
    <h2 class="text-center">Our Courses</h2>


<table class="table">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Image</th>
      <th scope="col">Course Name</th>
      <th scope="col">Edited</th>
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

      <td>{{$item->name}} ( Added {{$item->created_at->diffforhumans()}})</td>
      <td>{{$item->updated_at->diffforhumans()}}</td>
      <td> <a class='btn btn-outline-success' href="{{route('enroll.list',$item->id)}}">LIST</a> </td>
      <td>
        <a class='btn btn-primary' href="{{route('details.course',$item->id)}}">DETAILS</a>
        <a class='btn btn-danger' href="{{route('delete.course',$item->id)}}">DELETE</a>
        <a class='btn btn-warning' href="{{route('update.course',$item->id)}}">UPDATE</a>
      </td>

    </tr>
@endforeach

  </tbody>
</table>


@endsection
