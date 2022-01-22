@extends('welcome')

@section('content')
<h1>Update Event</h1>

<form action="{{route('updated.event', $event->id)}}" method="POST" enctype="multipart/form-data">
    @method('PATCH')
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Event Title</label>
        <input name="title" type="text" class="form-control" value="{{$event->title}}" id="formGroupExampleInput2" placeholder="Add Title Here" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Starting Date</label>
        <input name="sdate" type="text" class="form-control" value="{{$event->sdate}}" id="formGroupExampleInput"
         placeholder="Add date Here" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Ending Date</label>
        <input name="edate" type="text" class="form-control" value="{{$event->edate}}" id="formGroupExampleInput"
         placeholder="Add date Here" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Event Owner</label>
        <input name="name" type="text" class="form-control" value="{{$event->name}}" id="formGroupExampleInput" placeholder="Name" required>
      </div>
      <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input name="email" type="email" class="form-control" value="{{$event->email}}" id="inputEmail4" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Event description</label>
        <input name="description" type="text" class="form-control" value="{{$event->description}}" id="formGroupExampleInput2"  placeholder="Describe here"  autocomplete="off" spellcheck="false" required>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Add Image</label>
        <input name="image" type="file" class="form-control-file" value="{{$event->image}}" id="exampleFormControlFile1" multiple>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
