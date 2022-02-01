@extends('welcome')

@section('content')

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


<div class="text-center">
    <h3> Category Create Requests</h3>
 </div> <br>
     <table class="table">
         <thead>
           <tr>
             <th scope="col">Serial No </th>
             <th scope="col">Image</th>
             <th scope="col">Name</th>
             <th scope="col">Details </th>
             <th scope="col">Action</th>
           </tr>
         </thead>
         <tbody>

         @foreach ($applications as $key=>$item)
           <tr>
             <td>{{$key+1}}</td>
             <td>
               <img style="border-radius: 10px;" height="80px" width="120px;" src={{url('/uploads/galleries/'.$item->image)}} class="img-responsive" alt="artist">
             </td>

             <td>{{$item->name}}</td>
             <td>{{$item->details}}</td>

             <td>
                 <form action="{{route('apply.gallery.approve', $item->id)}}" method="post">
                     @csrf
                     <button value="1" name="action" class="btn btn-outline-success" type="submit">Approve</button>
                 </form>

                 <form action="{{route('apply.gallery.approve', $item->id)}}" method="post">
                     @csrf
                     <button value="0" name="action" class="btn btn-outline-danger" type="submit">Decline</button>
                 </form>
             </td>

           </tr>
       @endforeach

         </tbody>
       </table>

<br><br>


<div class="text-center">
<a href={{route('create.cat')}} class="btn btn-outline-success">Create a New Category</a>
</div><br>

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
          <a class='btn btn-success' href="{{route('add.image',$item->id)}}">Add image</a>
          <a class='btn btn-danger' href="{{route('cat.delete',$item->id)}}">DELETE</a>
          <a class='btn btn-warning' href="{{route('update.cat',$item->id)}}">UPDATE</a>
          <a class='btn btn-primary' href="{{route('details.gallery',$item->id)}}">Details</a> 
        </td>

      </tr>
  @endforeach

</tbody>
</table>



@endsection
