@extends('website.welcome')

@section('content')
<div class="container">

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


{{-- <a href="{{route('blog.create')}}" class="btn btn-outline-info">Create a new Blog</a> --}}
<br><br>
<table class="table">
	<thead>
	  <tr>
        <th scope="col">Serial No </th>
		<th scope="col">Image     </th>
        <th scope="col">Title     </th>
		<th scope="col">Moto      </th>
		{{-- <th scope="col">Full Name </th> --}}
		{{-- <th scope="col">Email     </th> --}}
		<th scope="col">Blog description</th>
		<th scope="col">Action	  </th>

	  </tr>
	</thead>
	<tbody>

  @foreach ($data as $key=>$item)
	  <tr>
		<td>{{$key+1}}</td>
		<th>
		  <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/blog/'.$item->image)}}
                 class="img-responsive" alt="blog">
		</th>

		<td>{{$item->title}}</td>
		<td>{{$item->moto}}</td>
		{{-- <td>{{$item->email}}</td> --}}
		<td>{{$item->description}}</td>
		<td>
			<a class='btn btn-danger' href="{{route('blog.deleting',$item->id)}}">DELETE</a>
			<a class='btn btn-warning' href="{{route('updating.blog',$item->id)}}">UPDATE</a>
		</td>

	  </tr>
  @endforeach

	</tbody>
  </table>
</div>
@endsection
