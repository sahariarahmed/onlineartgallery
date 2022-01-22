@extends('welcome')


@section('content')

{{-- forms  --}}
<form action="{{route('artists.store')}}" method="POST" enctype="multipart/form-data">
@csrf
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputFirstName">First Name</label>
      <input name="fname" type="text" class="form-control" id="inputFirstName" placeholder="First Name" required>
    </div>
    <div class="form-group col-md-6">
      <label for="inputLastName">Last Name</label>
      <input name="lname" type="text" class="form-control" id="inputLastName" placeholder="Last Name" required>
    </div>
  </div>

    <div class="form-group">
    <label for="inputEmail4">Email</label>
    <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
    </div>

    <div class="form-group">
    <label for="inputContact">Contact No.</label>
    <input name="contact" type="number" class="form-control" id="inputContact" placeholder="+880" required>
    </div>
  
  <div class="form-row">
    <div class="form-group col-md-6">
      <label for="inputCountry">Country</label>
      <input name="country" type="text" class="form-control" id="inputCountry" required>
    </div>

    <div class="form-group col-md-6">
      <label for="inputCity">City</label>
      <input name="city" type="text" class="form-control" id="inputCity">
    </div> 
  </div>
  
    <div class="form-group">
      <label for="exampleFormControlFile1">Add Image</label>
      <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
    </div>
  

  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>



@endsection