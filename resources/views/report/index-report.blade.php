@extends('layouts.master')
@section('content')
    {{-- Table --}}
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mt-2">
        <div class="mdc-card p-0" style="overflow: hidden">
            <div class="row">
                <div class="col-md-6">
                    {{-- <h6 class="card-title card-padding pb-2">Donasi</h6> --}}
                </div>

                <form class="col-md-10" action="" method="get">
                    <div class="col-md-12 d-flex ml-3 mt-3" style="">
                        <div class="col-md-2 mr-1">
                            <a href="/report/export-excel-donasi?<?php if (isset($status)) {
                                echo 'status=' . $status;
                            }
                            if (isset($status) && isset($startDate)) {
                                echo '&';
                            }
                            if (isset($startDate)) {
                                echo 'startDate=' . $startDate;
                            }
                            if ((isset($startDate) && isset($endDate)) || (isset($status) && isset($endDate))) {
                                echo '&';
                            }
                            if (isset($endDate)) {
                                echo 'endDate=' . $endDate;
                            } ?>" class="btn btn-success"
                                target="_blank">EXPORT EXCEL</a>
                        </div>
                        <div class="col-md-12 d-flex justify-content-end">
                            <div class="col-sm-2 mr-2">
                                <input type="text" onfocus="(this.type = 'date')" placeholder="Start date"
                                    @if (isset($startDate)) value="{{ $startDate }}" @endif name="startDate"
                                    class="form-control" id="startDate">
                            </div>

                            <div class="col-sm-2 mr-2">
                                <input type="text" onfocus="(this.type = 'date')"
                                    @if (isset($endDate)) value="{{ $endDate }}" @endif name="endDate"
                                    class="form-control" placeholder="End Date" id="endDate">
                            </div>

                            <div class="col-sm-2 mr-2">
                                <select class="form-control" name="status">
                                    <option align="center" value="">--Status--</option>
                                    <option value="Belum Selesai" @if (isset($status) && $status == 'Belum Selesai') selected="" @endif>Belum
                                        Selesai</option>
                                    <option value="Selesai" @if (isset($status) && $status == 'Selesai') selected="" @endif>Selesai
                                    </option>
                                </select>
                            </div>
                            <div class="col-sm-1">
                                <button class="btn btn-primary" type="submit">Filter</button>
                            </div>
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
                                <th class="text-left">Kelurahan</th>
                                <th class="text-left">Kecamatan</th>
                                <th class="text-left">Kota</th>
                                <th class="text-left">Provinsi</th>
                                <th class="text-left">Full Address</th>
                                <th class="text-left">Status</th>
                            </tr>
                        </thead>
                        @foreach ($donasi as $no => $value)
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
                                </tr>
                            </tbody>
                        @endforeach
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-end mt-3 mr-3">
                @if (isset($status))
                @elseif(isset($startDate))

                @elseif(isset($startDate))
                @else
                    {{ $donasi->links() }}
                @endif
            </div>
        </div>
    </div>
    </div>
@endsection
