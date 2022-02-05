@extends('website.welcome')

@section('content')

<div id="CoursePrint">

<div class="container">
@foreach ($data as $item)
  <br><br>

    <div class="col mt-5">
      <div class="card mb-3" style="max-width: 620px;">
        <div class="row no-gutters">
          <div class="col-md-6">
            <img style="border-radius: 8px;" width="240px;" height="150px;" src={{url('/uploads/courses/'.$item->image)}} class="card-img" alt="course">
          </div>
          <div class="col-md-6">
            <div class="card-body">
              <h5 class="card-title">{{$item->name}}</h5>
              <p class="card-text"><b>price: {{$item->price}} BDT</p>
              {{-- <p class="card-text"><small class="text-muted">{{$item->details}}</small></p> --}}
              <h5><a class='btn btn-success' href="{{route('view.course',$item->id)}}">View</a></h5>
            </div>
          </div>
        </div>
      </div>
    </div>


    <br><br>
@endforeach

{{-- <input class="btn btn-primary mr-5" type="button" onClick="PrintDiv('CoursePrint');" value="Print"> --}}
</div>
</div>

<br>

@endsection

{{-- <script language="javascript">
  function PrintDiv(divName) {
      var printContents = document.getElementById(divName).innerHTML;
      var originalContents = document.body.innerHTML;
      document.body.innerHTML = printContents;
      window.print();
      document.body.innerHTML = originalContents;
  }
</script> --}}
