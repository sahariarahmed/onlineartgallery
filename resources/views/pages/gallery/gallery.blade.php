@extends('welcome')

@section('content')

@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif
<a href={{route('create.cat')}} class="btn btn-outline-success">Create a New Category</a>


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

  @foreach ($data as $key=>$item)
      <tr>
        <td>{{$key+1}}</td>
        <th>
          <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/galleries/'.$item->image)}} class="img-responsive" alt="art">
        </th>

        <td>{{$item->name}}</td>
        <td>{{$item->details}}</td>

        <td>
          <a class='btn btn-primary' href="{{route('add.image',$item->id)}}">Add image</a>
          {{-- <a class='btn btn-danger' href="{{route('delete.event',$item->id)}}">DELETE</a> --}}
          {{-- <a class='btn btn-warning' href="{{route('update.event',$item->id)}}">UPDATE</a> --}}
        </td>

      </tr>
  @endforeach

</tbody>
</table>



@endsection
