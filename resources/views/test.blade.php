@extends('layouts.master')
@section('content')
    <!-- Button trigger modal -->
    {{-- <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        + Create Data
    </button> --}}

    {{-- Table --}}
    <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mt-2">
        <div class="mdc-card p-0">
            <h6 class="card-title card-padding pb-0">Data Yayasan</h6>
            <div class="table-responsive">
                <table class="table table-hoverable">
                    <thead>
                        <tr>
                            <th class="text-left">Nama Lengkap</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">No Telpon</th>
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
    {{-- @include('yayasan.create') --}}

    </div>

    <script>
        const tables = document.getElementById('table-yayasan')

        document.addEventListener("DOMContentLoaded", function() {
            getAllData();
        });

        async function getAllData() {
            const response = await fetch('/api/test',{
                method: 'GET'
            })
                .then(response => response.json())
                .then(dataRes => {
                    console.log(dataRes.data);
                    let content = "";
                    dataRes.data.map(dt => {
                        content +=`
                        <tr>
                            <td class="text-left">${dt.nama_lengkap}</td>
                            <td class="text-left">${dt.email}</td>
                            <td class="text-left">${dt.no_tlp}</td>
                        </tr>
                        `
                    });

                    tables.innerHTML = content;
                });
        }
    </script>
@endsection
