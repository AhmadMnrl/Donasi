@extends('layouts.master')
@section('content')
<div class="mdc-layout-grid">
            <div class="mdc-layout-grid__inner">
              <div class="mdc-layout-grid__cell--span-12">
                <div class="mdc-card">
                  <h6 class="card-title">Edit Data</h6>
                  <div class="template-demo">
                    <form method="POST" action="/donasi/update/{{$donasi->id}}">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Donatur</label>
                        <select class="form-select" name="id_donatur" id="">
                            <option value="" disabled selected>Pilih Donatur</option>
                            @foreach($donatur as $donatur)
                            <option value="{{$donatur->id}}"
                                @if($donatur->id == $donasi->id_donatur) selected="" @endif>{{$donatur->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jenis Donasi</label>
                        <select class="form-select" name="jenis_donasi" id="">
                            <option value="{{$donasi->jenis_donasi}}">{{$donasi->jenis_donasi}}</option>
                            <option value="barang">Barang</option>
                            <option value="uang">Uang</option>
                        </select>
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Jumlah</label>
                        <input type="text" name="jumlah" value="{{$donasi->jumlah}}" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Pengiriman</label>
                        <select class="form-select" name="pengiriman" id="">
                            <option value="{{$donasi->pengiriman}}">{{$donasi->pengiriman}}</option>
                            <option value="diambil">Diambil</option>
                            <option value="Diantar">Diantar</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Provinsi</label>
                        <input type="text" name="provinsi" value="{{$donasi->provinsi}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kota</label>
                        <input type="text" name="kota" value="{{$donasi->kota}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kecamatan</label>
                        <input type="text" name="kecamatan" value="{{$donasi->kecamatan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Kelurahan</label>
                        <input type="text" name="kelurahan" value="{{$donasi->kelurahan}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Latitude</label>
                        <input type="text" name="latitude" value="{{$donasi->latitude}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Longitude</label>
                        <input type="text" name="longitude" value="{{$donasi->longitude}}" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    </div>
                     <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Status</label>
                        <select class="form-select" name="status" id="">
                              <option value="{{$donasi->status}}">{{$donasi->status}}</option>
                            <option value="Selesai">Selesai</option>
                            <option value="Belum Selesai">Belum Selesai</option>
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
