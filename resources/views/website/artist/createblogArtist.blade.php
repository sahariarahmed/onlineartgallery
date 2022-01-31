@extends('website.welcome')

@section('content')
<div class="container">


    
    <form action="{{route('blog.store')}}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <label for="formGroupExampleInput">Title</label>
            <input name="title" type="text" class="form-control" id="formGroupExampleInput" placeholder="Add Title Here" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Moto</label>
            <input name="moto" type="text" class="form-control" id="formGroupExampleInput" placeholder="Add Moto Here">
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput">Full name</label>
            <input name="fullname" type="text" class="form-control" id="formGroupExampleInput" placeholder="Name" required>
          </div>
          <div class="form-group">
            <label for="inputEmail4">Email</label>
            <input name="email" type="email" class="form-control" id="inputEmail4" placeholder="Email" required>
          </div>
          <div class="form-group">
            <label for="formGroupExampleInput2">Blog description</label>
            <textarea input name="description" type="text" class="form-control" id="formGroupExampleInput2"  placeholder="Describe here" required autocomplete="off" spellcheck="false" required></textarea>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Add Image</label>
            <input name="image" type="file" class="form-control-file" id="exampleFormControlFile1">
          </div>


          <button type="submit" class="btn btn-primary">Submit</button>


    </form>


</div>
@endsection
