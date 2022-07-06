@extends('layouts.master')
@section('content')
<div class="card" style="width: 70rem;">
  <img class="rounded-circle mt-2 ml-4" width="150px" src="https://st3.depositphotos.com/15648834/17930/v/600/depositphotos_179308454-stock-illustration-unknown-person-silhouette-glasses-profile.jpg">
    <div class="card-body">
      <h5 class="card-title">{{$profile->nama_lengkap}}</h5>
      <p class="card-text">{{$profile->email}}</p>
    </div>
    <ul class="list-group list-group-flush">
      <li class="list-group-item">No Telpon    : {{$profile->no_tlp}}</li>
      <li class="list-group-item">Address      : {{$profile->address}}</li>
      <li class="list-group-item">Keterangan   : {{$profile->keterangan}}</li>
    </ul>
    <div class="card-body">
      <h5>Gallery</h5>
      <div style="background: rgb(209, 209, 209); padding: 20px">
        
        @foreach ($images as $item)  
        <img src="{{asset('image/'.$item->image)}}" width="250px" style="padding-left: 20px">
        @endforeach
        {{-- <br> --}}
      </div>
        <div class="mt-2">
          {{$images->links()}}
        </div>
      <br><br>
      <a href="/yayasan" class="btn btn-info">Back</a>
      <a href="#" class="btn btn-primary">Edit</a>
    </div>
  </div>
  @endsection