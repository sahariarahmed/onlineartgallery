@extends('welcome')

@section('content')
<h1>Update Course</h1>

<form action="{{route('updated.course', $course->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Course Name</label>
        <input name="name" placeholder="Enter Course Name" value="{{$course->name}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Course Price</label>
        <input name="price" placeholder="Enter Course Price" value="{{$course->price}}"  type="number" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>

    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Course details</label>
        <input name="details" placeholder="Enter Course details" value="{{$course->details}}" type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>

    <div class="mb-3">
        <label for="exampleFormControlFile1">Add Image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
      </div>


    <button type="submit" class="btn btn-success">Submit</button>
</form>
@endsection