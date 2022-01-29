<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="/css/font-awesome.min.css">

@extends('website.welcome')

@section('content')
  <div class='container'> <br>
    <div class="row text-center">

    <img style="border-radius: 10px;" height="35%" width="55%;" src={{url('/uploads/blog/'.$view->image)}} alt="blog">
<h1><u>{{$view->title}}</u></h1>
<h6> By {{$view->fullname}} </h6>

<h4> MOTO: "{{$view->moto}}"</h4>
</div>

<h3>Details: </h3>
<h3>{{$view->description}} </h3>


<div class="row text-center">
    <a class='btn btn-primary' href="{{route('like.store',$view->id)}}">Like-{{$view->liked()->count()}}</a>


<form action="{{route('comment.store', $view->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <p v-for="items in item" v-text="items"></p>
      <textarea input name="body" type="text" class="input" placeholder="Write a comment" v-model="newItem" @keyup.enter="addItem()"></textarea>
          <button v-on:click="addItem()" class='primaryContained float-right' type="submit">Add Comment</button>
    </div>
</form>

@foreach ($comments as $item)

    <p>{{$item->user->name}} {{$item->body}}</p>
    <p>{{$item->created_at}}</p>

@endforeach


</div>


<br><br><br><br>

</div>
</div>
@endsection
