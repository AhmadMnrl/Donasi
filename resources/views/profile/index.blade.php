@extends('layouts.master')
@section('content')
<div class="card" style="width: 60rem;">
    <center>
  <img class="rounded-circle mt-2 ml-4" width="150px" src="{{asset('admin/assets/images/faces/default.png')}}">
    <div class="card-body">
      <h5 class="card-title">{{$profile->name}}</h5>
      <p class="card-text">{{$profile->email}}</p>
    </div>
    </center>

    <div class="card-body">
    <form method="post" action="/update/{{$profile->id}}">
    @method('put')
    @csrf
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama</label>
        <input type="text" name="name" value="{{$profile->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
  <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Email</label>
        <input type="email" name="email" value="{{$profile->email}} "class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1">
    </div>
    <a href="/" class="btn btn-info">Back</a>
    <button type="submit" class="btn btn-primary">Edit</button>
    </form>
    </div>
  </div>
  @endsection
