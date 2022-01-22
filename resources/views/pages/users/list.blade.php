@extends('welcome')


@section('content')

<form action="{{route('list')}}" style="margin-left: 800px" method="GET">
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
        <th scope="col">Name</th>
        <th scope="col">Email</th>
        <th scope="col">Action</th>
      </tr>
    </thead>
    <tbody>

  @foreach ($data as $key=>$item)
      <tr>
        <td>{{$key+1}}</td>


        <td>{{$item->name}}</td>
        <td>{{$item->email}}</td>
        <td>
          <form action=" {{route('block',$item->id)}} ", method="POST">
              @csrf
              @method('PATCH')
              @if ($item->status == 'active')
                <button class="btn btn-outline-danger" type="submit" name="status" value="block">Block </button>
              @else
                <button class="btn btn-danger" type="submit" name="status" value="active"> Unblock </button>
              @endif
            </form>
        </td>

      </tr>
  @endforeach

    </tbody>
  </table>

@endsection
