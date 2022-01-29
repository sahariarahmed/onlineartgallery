@extends('welcome')

@section('content')

<table class="table">
  <thead>
    <tr>
      <th scope="col">N0</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Occupation</th>
      <th scope="col">Message</th>
      <th scope="col">Action</th>

    </tr>
  </thead>
  <tbody>

    @foreach ($data as $key=>$item)
    <tr>
      <td>{{$key+1}}</td>

      <td>{{$item->name}}</td>
      <td>{{$item->email}}</td>
      <td>{{$item->occupation}}</td>
      <td>{{$item->message}}</td>
      <td>
        <form action=" {{route('response',$item->id)}} ", method="POST">
            @csrf
            @method('PATCH')
            @if ($item->status == 'active')
              <button class="btn btn-warning" type="submit" name="status" value="block">Response </button>
            @else
              <button class="btn btn-outline-success" type="submit" name="status" value="active"> Responded </button>
            @endif
          </form>
          <a class='btn btn-outline-danger' href="{{route('contact.delete',$item->id)}}">DELETE</a>
      </td>


    </tr>
@endforeach

  </tbody>
</table>


@endsection
