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


<a href="{{route('artist.create')}}" class="btn btn-success">Register a New Artist</a>
<br><br>
<table class="table">
	<thead>
	  <tr>
		<th scope="col">Serial No </th>
		<th scope="col">Image     </th>
		<th scope="col">First Name</th>
		<th scope="col">Last Name </th>
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
  
		<td>{{$item->fname}}</td>
		<td>{{$item->lname}}</td>
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

@endsection