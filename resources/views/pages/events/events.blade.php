@extends('welcome')

@section('content')


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



<a href={{route('event.create')}} class="btn btn-outline-success">Create a New Event</a>

<form action="{{route('event.list')}}" style="margin-left: 800px" method="GET">
    <div class="input-group">
        <input name="search" value="{{$key}}" type="search" class="form-control rounded" placeholder="Search" aria-label="Search"
        aria-describedby="search-addon" />
        <button type="submit" class="btn btn-outline-primary" style="height: 40px; margin-top: 20px;">Search</button>
    </div>
</form>

    @if($key)
    <h5>
        Your are searching for: "<b>{{$key}}</b>"<br>
        Found: <b>{{$data->count()}}</b>
    </h5>
    @endif


<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">Image</th>
        <th scope="col">Event title</th>
        <th scope="col">Event Owner</th>
        <th scope="col">Place</th>
        <th scope="col">Action</th>

      </tr>
    </thead>
    <tbody>

  @foreach ($data as $key=>$item)
      <tr>
        <td>{{$key+1}}</td>
        <th>
          <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/events/'.$item->image)}} class="img-responsive" alt="events">
        </th>

        <td>{{$item->title}}</td>
        <td>{{$item->name}}</td>
        <td>{{$item->place}}</td>

        <td>
          <a class='btn btn-primary' href="{{route('details.event',$item->id)}}">DETAILS</a>
          <a class='btn btn-danger' href="{{route('delete.event',$item->id)}}">DELETE</a>
          <a class='btn btn-warning' href="{{route('update.event',$item->id)}}">UPDATE</a>
        </td>

      </tr>
  @endforeach

</tbody>
</table>




@endsection
