@extends('welcome')

  
@section('content')

<p><th>   
    <img style="border-radius: 10px;" height="120px" width="160px;" src={{url('/uploads/artists/'.$details->image)}} class="img-responsive" alt="artist">
  </th></p>
<p>First Name:  {{$details->fname}}</p>
<p>Last Name:   {{$details->lname}}</p>
<p>Email:       {{$details->email}}</p>
<p>Contact:     {{$details->contact}}</p>
<p>Country:     {{$details->country}}</p>
<p>City:        {{$details->city}}</p>


    
@endsection

    