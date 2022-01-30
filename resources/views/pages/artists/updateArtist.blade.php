@extends('welcome')


@section('content')
<h1>Update Artist</h1>
{{-- forms  --}}
<form action="{{route('updated.artist', $artist->id)}}" method="POST" enctype="multipart/form-data">
@method('PATCH')
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFirstName">First Name</label>
      <input name="name" type="text" class="form-control" id="inputFirstName" value="{{$artist->user->name}}" placeholder="First Name" required>
    </div>

    <div class="form-group">
    <label for="inputEmail4">Email</label>
    <input name="email" type="email" class="form-control" id="inputEmail4" value="{{$artist->user->email}}" placeholder="Email" required>
    </div>

    <div class="form-group">
    <label for="inputContact">Contact No.</label>
    <input name="contact" type="number" class="form-control" id="inputContact" value="{{$artist->contact}}" placeholder="+880" required>
    </div>

  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCountry">Country</label>
      <input name="country" type="text" class="form-control" id="inputCountry" value="{{$artist->country}}" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input name="city" type="text" class="form-control" value="{{$artist->city}}" id="inputCity">
    </div>
  </div>

    <div class="form-group">
      <label for="exampleFormControlFile1">Add Image</label>
      <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>



  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection
