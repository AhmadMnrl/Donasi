@extends('layouts.master')
@section('content')

    {{-- Table --}}
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mt-2">
        <div class="mdc-card p-0">
             <div class="row">
                <div class="col-md-6">
                    {{-- <h6 class="card-title card-padding pb-2">Donasi</h6> --}}
                </div>

                <form class="col-md-10" action="" method="get">
                <div class="col-md-12 d-flex ml-3 mt-3" style="">
                    <div class="col-md-2 mr-1">
                        <a href="/report/export-excel-donasi" class="btn btn-success" target="_blank">EXPORT EXCEL</a>
                    </div>
                        <div class="col-sm-2 pt-2 mr-2 d-flex justify-content-end">
                            <h6 for="startDate">Start Date : </h6>
                        </div>
                        <div class="col-sm-2">
                            <input type="date" @if(isset($startDate))value="{{$startDate}}"@endif name="startDate" class="form-control" id="startDate">
                        </div>
                        <div class="col-sm-2 pt-2 mr-2 d-flex justify-content-end">
                            <h6 for="endDate">End Date : </h6>
                        </div>
                        <div class="col-sm-2 mr-2">
                            <input type="date" @if(isset($endDate))value="{{$endDate}}"@endif name="endDate" class="form-control" id="endDate">
                        </div>
                        <div class="col-sm-2 mr-2">
                            <select class="form-control" name="status">
                                <option align="center" value="">--Status--</option>
                                <option value="Belum Selesai" @if(isset($status) == "Belum Selesai") selected="" @endif>Belum Selesai</option>
                                <option value="Selesai" @if(isset($status) == "Selesai") selected="" @endif>Selesai</option>
                            </select>
                        </div>
                        <div class="col-sm-2 mr-4">
                            <button class="btn btn-primary" type="submit">Filter</button>
                        </div>
                    </div>
                </form>
             <div class="table-responsive">
                <table class="table table-hoverable">
                    <thead>
                        <tr>
                            <th class="text-left">No</th>
                            <th class="text-left">Donatur</th>
                            <th class="text-left">Jenis Donasi</th>
                            <th class="text-left">Jumlah</th>
                            <th class="text-left">Pengiriman</th>
                            <th class="text-left">Provinsi</th>
                            <th class="text-left">Kota</th>
                            <th class="text-left">Kecamatan</th>
                            <th class="text-left">Kelurahan</th>
                            <th class="text-left">Full Address</th>
                            <th class="text-left">Status</th>
                        </tr>
                    </thead>
                    @foreach ($donasi as $no =>$value)
                    <tbody id="table-donasi">
                        <tr>
                            <td class="text-left">{{$no+1}}</td>
                            <td class="text-left">{{$value->donatur->name ?? $value->nama ?? ""}}</td>
                            <td class="text-left">{{$value->jenis_donasi}}</td>
                            <td class="text-left">{{$value->jumlah}}</td>
                            <td class="text-left">{{$value->pengiriman}}</td>
                            <td class="text-left">{{$value->provinsi}}</td>
                            <td class="text-left">{{$value->kota}}</td>
                            <td class="text-left">{{$value->kecamatan}}</td>
                            <td class="text-left">{{$value->kelurahan}}</td>
                            <td class="text-left">{{$value->full_address}}</td>
                            <td class="text-left">{{$value->status}}</td>
                        </tr>
                    </tbody>
                @endforeach
                </table>
            </div>
            </div>
            <div class="d-flex justify-content-end mt-3 mr-3">
                @if(!isset($status))
                    @if (isset($status) != NULL)
                    {{$donasi -> links()}}
                    @endif
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
