@extends('website.welcome')

@section('content')
@if(session()->has('update'))
    <p class="alert alert-success">
        {{session()->get('update')}}
    </p>
@endif
<br>

<div class="container">
<form action="{{route('apply.artist.store')}}" method="POST" enctype="multipart/form-data">
    @csrf

        <div class="form-group">
        <label for="inputContact">Contact No.</label>
        <input name="contact" type="number" class="form-control" id="inputContact" required>
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

        <div class="form-group">
            <label for="exampleFormControlFile1">Add CV</label>
            <input name="pdf" type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>



      <button type="submit" class="btn btn-primary">Submit</button>
    </form>










</div>
@endsection
