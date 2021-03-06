@extends('website.welcome')
@section('content')

@if(session()->has('login'))
    <p class="alert alert-success">
        {{session()->get('login')}}
    </p>
@endif

@if(session()->has('logout'))
    <p class="alert alert-success">
        {{session()->get('logout')}}
    </p>
@endif

@if(session()->has('success'))
    <p class="alert alert-success">
        {{session()->get('success')}}
    </p>
@endif



<section id="home" class="main-home parallax-section">
    <div class="overlay"></div>
    <div id="particles-js"></div>
    <div class="container">
         <div class="row">

              <div class="col-md-12 col-sm-12">
                   <h1>Hello! This is an ARTstairs</h1>
                   <h4>An art gallery to fresh your mind...</h4>
                   <a href={{route('show.dashboard')}} class="smoothScroll btn btn-default">Discover</a>
              </div>

         </div>
    </div>
</section>

@endsection
