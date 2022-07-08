@extends('layouts.master')
@section('content')
@if (session('error'))
     <script>
        alert('Anda Tidak Memiliki Akses')
    </script>
@endif
@if (session('message'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        <strong>{{ session('message') }}</strong>
    </div>
    @endif
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
             <div
                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-5-desktop mdc-layout-grid__cell--span-5-tablet">
                <div class="mdc-card info-card info-card--danger">
                    <div class="card-inner">
                        <h5 class="card-title">Saldo</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom">@currency($saldo->saldo)</h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">attach_money</i>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-5-desktop mdc-layout-grid__cell--span-5-tablet">
                <div class="mdc-card info-card info-card--primary">
                    <div class="card-inner">
                        <h5 class="card-title">Summary Donasi</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom">
                            @foreach ( $summary as $key => $value)
                                {{$value['jenis_donasi']}} : {{$value['jumlah']}}  <br>
                            @endforeach
                        </h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">trending_up</i>
                        </div>
                    </div>
                </div>
            </div>
             <div
                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-10-desktop mdc-layout-grid__cell--span-10-tablet">
                <div class="mdc-card info-card info-card--success">
                    <div class="card-inner" style="margin-right: 10%;">
                        <h5 class="card-title">Daftar Donasi</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom">
                            <table class="table table-striped table-responsive">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Nama Donatur</th>
                                        <th>Jenis Donasi</th>
                                        <th>Provinsi</th>
                                        <th>Jenis Pengiriman</th>
                                        <th>Jumlah</th>
                                        <th>status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ( $daftar as $key => $value )
                                    <tr>
                                        <td>{{$key+1}}</td>
                                        <td>{{$value->donatur->nama}}</td>
                                        <td>{{$value->jenis_donasi}}</td>
                                        <td>{{$value->provinsi}}</td>
                                        <td>{{$value->pengiriman}}</td>
                                        <td>{{$value->jumlah}}</td>
                                        <td>{{$value->status}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">dvr</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
