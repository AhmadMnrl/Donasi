@extends('layouts.master')
@section('content')

    {{-- Table --}}
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mt-2">
        <div class="mdc-card p-0">
             <div class="row">
                <div class="col-md-6">
                    <h6 class="card-title card-padding pb-2">Data Donatur</h6>
                </div>
                <div class="col-md-6 d-flex justify-content-end card-title card-padding pb-3" style="padding-right: 25px">
                    <button style="width: 20px" data-bs-toggle="modal" data-bs-target="#exampleModal" class="mdc-button mdc-button--raised icon-button filled-button--warning mdc-ripple-upgraded " style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:13.625px, 8.5px; --mdc-ripple-fg-translate-end:7.5px, 7.5px;">
                    <i class="material-icons mdc-button__icon">add</i>
                </button>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-hoverable">
                    <thead>
                        <tr>
                            <th class="text-left">Nama Lengkap</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">No Telpon</th>
                            <th class="text-left">Alamat</th>
                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-donatur">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Table --}}
    @include('donatur.create')

    </div>

    <script>
        const tables = document.getElementById('table-donatur')

        document.addEventListener("DOMContentLoaded", function() {
            getAllData();
        });

        async function getAllData() {
            const response = await fetch('/api/donatur',{
                method: 'GET'
            })
                .then(response => response.json())
                .then(dataRes => {
                    console.log(dataRes.data);
                    let content = "";
                    dataRes.data.map(dt => {
                        content +=`
                        <tr>
                            <td class="text-left">${dt.nama}</td>
                            <td class="text-left">${dt.email}</td>
                            <td class="text-left">${dt.no_telp}</td>
                            <td class="text-left">${dt.alamat}</td>
                            <td class="text-left">
                                <a href="/donatur/edit/${dt.id}" class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:15.5625px, 7.16669px; --mdc-ripple-fg-translate-end:7.5px, 7.5px;">
                                <i class="material-icons mdc-button__icon">colorize</i>
                                </a>
                                <a href="/donatur/destroy/${dt.id}" class="mdc-button mdc-button--raised icon-button filled-button--secondary mdc-ripple-upgraded">
                                <i class="material-icons mdc-button__icon">delete</i>
                                </a>
                            </td>
                        </tr>
                        `
                    });

                    tables.innerHTML = content;
                });
        }
    </script>
@endsection
