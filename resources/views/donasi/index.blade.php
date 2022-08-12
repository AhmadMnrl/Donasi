@extends('layouts.master')
@section('content')
    {{-- Table --}}
    @if (session('message'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            <strong>{{ session('message') }}</strong>
        </div>
    @endif
    @if (session('message2'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            <strong>{{ session('message2') }}</strong>
        </div>
    @endif
    @if (session('message3'))
        <div class="alert alert-primary alert-dismissible fade show" role="alert">
            <strong>{{ session('message3') }}</strong>
        </div>
    @endif
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mt-2">
        <div class="mdc-card p-0">
            <div class="row">
                <div class="col-md-6">
                    <h6 class="card-title card-padding pb-2">Donasi</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end card-title card-padding pb-3" style="padding-right: 25px">
                    <button style="width: 20px" data-bs-toggle="modal" data-bs-target="#exampleModal"
                        class="mdc-button mdc-button--raised icon-button filled-button--warning mdc-ripple-upgraded "
                        style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:13.625px, 8.5px; --mdc-ripple-fg-translate-end:7.5px, 7.5px;">
                        <i class="material-icons mdc-button__icon">add</i>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hoverable">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Donatur</th>
                            <th class="text-left">Jenis Donasi</th>
                            <th class="text-left">Jumlah</th>
                            <th class="text-left">Pengiriman</th>
                            <th class="text-left">Kelurahan</th>
                            <th class="text-left">Kecamatan</th>
                            <th class="text-left">Kota</th>
                            <th class="text-left">Provinsi</th>
                            <th class="text-left">Full Address</th>
                            <th class="text-left">Status</th>
                            <th class="text-left">Foto</th>
                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    @foreach ($data as $no => $value)
                        <tbody id="table-donasi">
                            <tr>
                                <td class="text-left">{{ $no + 1 }}</td>
                                <td class="text-left">{{ $value->donatur->nama ?? ($value->name ?? '') }}</td>
                                <td class="text-left">{{ $value->jenis_donasi }}</td>
                                <td class="text-left">{{ $value->jumlah }}</td>
                                <td class="text-left">{{ $value->pengiriman }}</td>
                                <td class="text-left">{{ $value->kelurahan }}</td>
                                <td class="text-left">{{ $value->kecamatan }}</td>
                                <td class="text-left">{{ $value->kota }}</td>
                                <td class="text-left">{{ $value->provinsi }}</td>
                                <td class="text-left">{{ $value->full_address }}</td>
                                <td class="text-left">{{ $value->status }}</td>

                                <td class="text-left">
                                    @if($value->foto > 0)
                                        <img src="{{asset('image/'.$value->foto)}}" alt="" width="50%" height="50px" style="max-width: 100%; max-height: 100%;">
                                    @else
                                        <strong>NULL</strong>
                                    @endif
                                 </td>
                                <td class="text-left">
                                    <a href="/donasi/edit/{{ $value->id }}"
                                        class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded"
                                        style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:15.5625px, 7.16669px; --mdc-ripple-fg-translate-end:7.5px, 7.5px;">
                                        <i class="material-icons mdc-button__icon">colorize</i>
                                    </a>
                                    <a href="/donasi/destroy/{{ $value->id }}"
                                        class="mdc-button mdc-button--raised icon-button filled-button--secondary mdc-ripple-upgraded">
                                        <i class="material-icons mdc-button__icon">delete</i>
                                    </a>
                                </td>
                            </tr>
                        </tbody>
                    @endforeach
                </table>
            </div>
            <div class="d-flex justify-content-end mt-3 mr-3">
                {{ $data->links() }}
            </div>
        </div>
    </div>
    {{-- End Table --}}
    @include('donasi.create')

    </div>
@endsection
