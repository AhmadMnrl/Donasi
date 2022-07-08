@extends('layouts.master')
@section('content')
<a href="/yayasan" class="btn btn-sm btn-danger">Back</a>
<div class="card mt-2 text-center" style="width: 100%;">
    <div class="card-header text-center">
                    Detail Yayasan
    </div>
        <div style="">
            <img class="rounded-circle mt-2 ml-4" width="150px" src="{{ asset('admin/assets/images/faces/default.png') }}">
            <div class="card-body">
                <h5 class="card-title">{{ $profile->nama_lengkap }}</h5>
                <p class="card-text">{{ $profile->email }}</p>
            </div>
        </div>

        <ul class="list-group list-group-flush">
            <li class="list-group-item">No Telpon : {{ $profile->no_tlp }}</li>
            <li class="list-group-item">Address : {{ $profile->address }}</li>
            <li class="list-group-item">Keterangan : {{ $profile->keterangan }}</li>
        </ul>
        <div class="card-body">
            <div class="card text-center mt-3">
                <div class="card-header">
                    Gallery
                </div>
                <div class="card-body">
                    <div class="row">
                        @foreach ($images as $item)
                        <div class="col-sm-4">
                            <div class="card">
                                <div class="card-body" style=" width: 100%; min-height: 20px; max-height: 100%; float: left; margin: 3px;">
                                    <img src="{{ asset('image/' . $item->image) }}" width="100%" height="120px" style="max-width: 100%; max-height: 100%;">
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    </div>
                    <div class="card-footer d-flex justify-content-center" style="padding-bottom: 0px">
                         {{ $images->links() }}
                    </div>
                </div>
            </div>
        </div>
    @endsection
