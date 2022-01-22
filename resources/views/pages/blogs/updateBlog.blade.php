@extends('welcome')


@section('content')

<form action="{{route('updated.blog', $blog->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Title</label>
        <input name="title" type="text" class="form-control" id="formGroupExampleInput" value="{{$blog->title}}" placeholder="Add Title Here" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Moto</label>
        <input name="moto" type="text" class="form-control" id="formGroupExampleInput" value="{{$blog->moto}}" placeholder="Add Moto Here">
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Full name</label>
        <input name="fullname" type="text" class="form-control" id="formGroupExampleInput" value="{{$blog->fullname}}" placeholder="Name" required>
      </div>
      <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input name="email" type="email" class="form-control" id="inputEmail4" value="{{$blog->email}}" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Blog description</label>
        <input name="description" type="text" class="form-control" id="formGroupExampleInput2" value="{{$blog->description}}"  placeholder="Describe here" autocomplete="off" spellcheck="false" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Add Image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>


</form>
    
@endsection