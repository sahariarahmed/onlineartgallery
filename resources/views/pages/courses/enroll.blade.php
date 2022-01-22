@extends('welcome')

@section('content')

<table class="table">
    <thead>
      <tr>
        <th scope="col">No</th>
        <th scope="col">User Name</th>
        <th scope="col">email</th>
      </tr>
    </thead>


    <tbody>
  @foreach ($list as $key=>$item)
      <tr>
        <td>{{$key+1}}</td>
        <td> {{$item->user->name}} </td>
        <td> {{$item->user->email}} </td>
      </tr>
  @endforeach


    </tbody>
  </table>
  @endsection
