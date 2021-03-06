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

  @foreach ($data as $key=>$item)
      <tr>
        <td>{{$key+1}}</td>
        <th>
          <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/galleries/'.$item->image)}} class="img-responsive" alt="art">
        </th>

        <td>{{$item->name}}</td>
        <td>{{$item->details}}</td>

        <td>
          <a class='btn btn-success' href="{{route('artist.add.image',$item->id)}}">Add image</a>
          <a class='btn btn-danger' href="{{route('cat.delete',$item->id)}}">DELETE</a>
          <a class='btn btn-warning' href="{{route('update.cat',$item->id)}}">UPDATE</a>
          <a class='btn btn-primary' href="{{route('details.artist.gallery',$item->id)}}">Details</a>
        </td>

      </tr>
  @endforeach

</tbody>
</table>


</div>
@endsection
