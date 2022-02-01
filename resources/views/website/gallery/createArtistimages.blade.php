@extends('website.welcome')

@section('content')
<div class="container">

<form action="{{route('store.image', $gallery_id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="exampleFormControlFile1">Add Image</label>
        <input name="image[]" type="file" class="form-control-file" id="exampleFormControlFile1" multiple required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>



</form>

</div>
@endsection
