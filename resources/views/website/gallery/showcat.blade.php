<style>
    a{
        text-decoration: none;
        color: black;
    }
    a:hover{
        text-decoration: none;
        color: black;
        transform: scale(1.2);
    }
</style>

@extends('website.welcome')
@section('content')
<div class="container">
<br>


<h5>Details: </h5>
<h4>[{{$view->details}}]</h4>

@foreach ($images as $item)

<img style="border-radius: 5px;" width="370px;" height="340px;" src={{url('/uploads/'.$item->image)}} class="card-img" alt="arts">


@endforeach

<br><br>
<form action="{{route('store.art.comment', $view->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="container">
        <p v-for="items in item" v-text="items"></p>
      <textarea input name="body" type="text" class="input" placeholder="Write a comment" v-model="newItem" @keyup.enter="addItem()"></textarea>
          <button v-on:click="addItem()" class='primaryContained float-right' type="submit">Add Comment</button>
    </div>
</form>


@foreach ($comments as $item)

    <p><b>{{$item->user->name}}</b>: {{$item->body}}</p>
    <h4>{{$item->created_at->diffforhumans()}}</h4>
@endforeach

<br><br>
</div>
@endsection
