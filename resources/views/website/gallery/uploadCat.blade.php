@extends('website.welcome')



@section('content')
<div class="container">

<form action="#" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input name="name" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Add Categroy Name Here" required>
      </div>

      <div class="form-group">
        <label for="formGroupExampleInput2">Details</label>
        <textarea input name="details" type="text" class="form-control" id="formGroupExampleInput2"  placeholder="Describe here" autocomplete="off" spellcheck="false" required></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Add Image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" required>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

</div>
@endsection
