@extends('welcome')


@section('content')

<form action="{{route('updated.cat', $cat->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
      <div class="form-group">
        <label for="formGroupExampleInput">Name</label>
        <input name="name" type="text" class="form-control" id="formGroupExampleInput2" value="{{$cat->name}}" placeholder="Add Categroy Name Here">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Details</label>
       <input name="details" type="text" class="form-control" id="formGroupExampleInput2" value="{{$cat->details}}"  placeholder="Describe here" autocomplete="off" spellcheck="false">
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Add Image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>


</form>

@endsection
