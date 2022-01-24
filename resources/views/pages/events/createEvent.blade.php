@extends('welcome')

@section('content')

<form action="{{route('event.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="formGroupExampleInput">Event Title</label>
        <input name="title" type="text" class="form-control" id="formGroupExampleInput2" placeholder="Add Title Here" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Starting Date</label>
        <input name="sdate" type="text" class="form-control" id="formGroupExampleInput" onfocus="(this.type='date')"
        onblur="(this.type='text')" placeholder="Add date Here" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Ending Date</label>
        <input name="edate" type="text" class="form-control" id="formGroupExampleInput" onfocus="(this.type='date')"
        onblur="(this.type='text')" placeholder="Add date Here" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput">Event Owner</label>
        <input name="name" type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" required>
      </div>
      <div class="form-group">
        <label for="inputEmail4">Email</label>
        <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
      </div>
      <div class="form-group">
        <label for="formGroupExampleInput2">Event description</label>
        <textarea input name="description" type="text" class="form-control" id="formGroupExampleInput2"  placeholder="Describe here" autocomplete="off" spellcheck="false" required></textarea>
      </div>
      <div class="form-group">
        <label for="exampleFormControlFile1">Add Image</label>
        <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1" multiple required>
      </div>

      <div class="form-group">
        <label for="exampleFormControlFile1">Multiple Image</label>
        <input name="images[]" type="file" class="form-control-file" id="exampleFormControlFile1" multiple>
      </div>


      <button type="submit" class="btn btn-primary">Submit</button>

    </form>

@endsection
