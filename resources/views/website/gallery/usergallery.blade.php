@extends('website.welcome')

@section('content')
<div class="container">

@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif

@if(session()->has('update'))
    <p class="alert alert-success">
        {{session()->get('update')}}
    </p>
@endif

<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Image</th>
        <th scope="col">Name</th>
        <th scope="col">Details</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>


      <tr>
        <th>
          <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/galleries/'.$data->image)}} class="img-responsive" alt="art">
        </th>

        <td>{{$data->name}}</td>
        <td>{{$data->details}}</td>

        <td>
          <a class='btn btn-success' href="{{route('artist.add.image',$data->id)}}">Add image</a>

        </td>

      </tr>


</tbody>
</table>


</div>
@endsection
