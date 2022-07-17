@extends('layouts.master')
@section('content')

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
                    <h6 class="card-title card-padding pb-2">Data User</h6>
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
                            <th class="text-left">No</th>
                            <th class="text-left">Name</th>
                            <th class="text-left">Email</th>
                            <th class="text-left">Role</th>
                            <th class="text-left">Action</th>
                        </tr>
                    </thead>
                    @foreach ($user as $no =>$value)
                    <tbody id="table-donatur">
                        <tr>
                            <td class="text-left">{{$no+1}}</td>
                            <td class="text-left">{{$value->name}}</td>
                            <td class="text-left">{{$value->email}}</td>
                            <td class="text-left">{{$value->role}}</td>
                            <td class="text-left">
                                <a href="/user/edit/{{$value->id}}" class="mdc-button mdc-button--raised icon-button filled-button--success mdc-ripple-upgraded" style="--mdc-ripple-fg-size:21px; --mdc-ripple-fg-scale:2.90056; --mdc-ripple-fg-translate-start:15.5625px, 7.16669px; --mdc-ripple-fg-translate-end:7.5px, 7.5px;">
                                    <i class="material-icons mdc-button__icon">colorize</i>
                                 </a>

                                <a href="/user/destroy/{{$value->id}}" class="mdc-button mdc-button--raised icon-button filled-button--secondary mdc-ripple-upgraded">
                                <i class="material-icons mdc-button__icon">delete</i>
                                </a>
                            </td>
                        </tr>
                    </tbody>
                @endforeach
                </table>
            </div>
        </div>
    </div>
    {{-- End Table --}}
    @include('user.create-user')

    </div>
@endsection
