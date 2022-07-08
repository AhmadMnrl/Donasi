@extends('layouts.master')
@section('content')
<div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <h6 class="card-title">Edit Data</h6>
                  <div class="template-demo">
                    <form method="POST" action="/user/update/{{$user->id}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                        <input type="text" name="nama_lengkap" value="{{$user->name}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email</label>
                        <input type="email" name="email" value="{{$user->email}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Role</label>
                        <select class="form-select" name="role" id="">
                            <option value="{{$user->role}}">{{ Str::ucfirst ($user->role)}}</option>
                            <option value="administrator">Administrator</option>
                            <option value="staff">Staff</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
