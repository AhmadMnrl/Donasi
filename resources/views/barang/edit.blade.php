@extends('layouts.master')
@section('content')
<div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <h6 class="card-title">Edit Data</h6>
                  <div class="template-demo">
                    <form method="POST" action="/barang_donatur/update/{{$barang->id}}">
                        @csrf
                        @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Nama Barang</label>
                        <input type="text" name="nama" value="{{$barang->nama}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Keterangan</label>
                        <input type="text" name="keterangan" value="{{$barang->keterangan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                  </div>
                </div>
              </div>
            </div>
          </div>
@endsection
