@extends('welcome')

@section('content')
{{-- pop up --}}
@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>-
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

{{-- body --}}
<div class="text-center">
   <h3> Artist Registration Requests</h3>
</div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Serial No </th>
            <th scope="col">Image     </th>
            <th scope="col">CV </th>
            <th scope="col">Name </th>
            <th scope="col">Email     </th>
            <th scope="col">Contact No</th>
            <th scope="col">Country   </th>
            <th scope="col">City      </th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>

        @foreach ($applications as $key=>$item)
          <tr>
            <td>{{$key+1}}</td>
            <td>
              <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/artists/'.$item->image)}} class="img-responsive" alt="artist">
            </td>

            <td>
                <a href="{{url('/uploads/artists/'.$item->pdf)}}">PDF</a>
                
            </td>
            <td>{{$item->user->name}}</td>
            <td>{{$item->user->email}}</td>
            <td>{{$item->contact}}</td>
            <td>{{$item->country}}</td>
            <td>{{$item->city}}</td>
            <td>
                <form action="{{route('apply.artist.approve',$item->id)}}" method="post">
                    @csrf
                    <button value="1" name="action" class="btn btn-outline-success" type="submit">Approve</button>
                </form>

                <form action="{{route('apply.artist.approve',$item->id)}}" method="post">
                    @csrf
                    <button value="0" name="action" class="btn btn-outline-danger" type="submit">Decline</button>
                </form>
            </td>

          </tr>
      @endforeach

        </tbody>
      </table>





<div class="text-center">
<a href="{{route('artist.create')}}" class="btn btn-success">Register a New Artist</a>
<br><br>
<h3>Artist List</h3>
</div>

<table class="table">
	<thead>
	  <tr>
		<th scope="col">Serial No </th>
		<th scope="col">Image     </th>
		<th scope="col">Name</th>
		<th scope="col">Email </th>
		{{-- <th scope="col">Email     </th>
		<th scope="col">Contact No</th>
		<th scope="col">Country   </th>
		<th scope="col">City      </th> --}}
		<th scope="col">Action</th>
	  </tr>
	</thead>
	<tbody>

  @foreach ($data as $key=>$item)
	  <tr>
		<td>{{$key+1}}</td>
		<th>
		  <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/artists/'.$item->image)}} class="img-responsive" alt="artist">
		</th>

		<td>{{$item->user->name}}</td>
		<td>{{$item->user->email}}</td>
		{{-- <td>{{$item->email}}</td>
		<td>{{$item->contact}}</td>
		<td>{{$item->country}}</td>
		<td>{{$item->city}}</td> --}}
		<td>
			<a class='btn btn-primary' href="{{route('details.artist',$item->id)}}">DETAILS</a>
			<a class='btn btn-danger' href="{{route('delete.artist',$item->id)}}">DELETE</a>
			<a class='btn btn-warning' href="{{route('update.artist',$item->id)}}">UPDATE</a>

		</td>
	  </tr>
  @endforeach

	</tbody>
  </table>
</div>
@endsection
