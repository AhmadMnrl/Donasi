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
                    <h6 class="card-title card-padding pb-2">Data Yayasan</h6>
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
                            <th class="text-left">Address</th>
                            <th class="text-left">Keterangan</th>
                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    <tbody id="table-yayasan">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    {{-- End Table --}}
    @include('yayasan.create')

    </div>

    <script>
        const tables = document.getElementById('table-yayasan')

        document.addEventListener("DOMContentLoaded", function() {
            getAllData();
        });

        async function getAllData() {
            const response = await fetch('/api/yayasan', {
                    method: 'GET'
                })
                .then(response => response.json())
                .then(dataRes => {
                    console.log(dataRes.data);
                    let content = "";
                    dataRes.data.map(dt => {
                        content += `
                        <tr>
                            <td class="text-left">${dt.nama_lengkap}</td>
                            <td class="text-left">${dt.email}</td>
                            <td class="text-left">${dt.no_tlp}</td>
                            <td class="text-left">${dt.address}</td>
                            <td class="text-left">${dt.keterangan}</td>
                            <td class="text-left">
                                <a href="/yayasan/edit/${dt.id}" class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:15.5625px, 7.16669px; --mdc-ripple-fg-translate-end:7.5px, 7.5px;">
                                    <i class="material-icons mdc-button__icon">colorize</i>
                                    </a>
                                <a href="/yayasan/destroy/${dt.id}" class="mdc-button mdc-button--raised icon-button filled-button--secondary mdc-ripple-upgraded">
                                <i class="material-icons mdc-button__icon">delete</i>
                                </a>
                                <a href="/profileYayasan/${dt.id}" class="mdc-button mdc-button--raised icon-button primary-button--secondary mdc-ripple-upgraded">
                                   <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-person-lines-fill" viewBox="0 0 16 16">
                                   <path d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm-5 6s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1H1zM11 3.5a.5.5 0 0 1 .5-.5h4a.5.5 0 0 1 0 1h-4a.5.5 0 0 1-.5-.5zm.5 2.5a.5.5 0 0 0 0 1h4a.5.5 0 0 0 0-1h-4zm2 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2zm0 3a.5.5 0 0 0 0 1h2a.5.5 0 0 0 0-1h-2z"></path>
                                 </svg>
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
