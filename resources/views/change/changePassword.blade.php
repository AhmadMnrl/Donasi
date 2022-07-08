@extends('layouts.master')
@section('content')
 <div class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-12 mt-2">
            <div class="mdc-card p-0">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-6 d-flex justify-content-center">
                        <h6 class="card-title card-padding pb-2">Change Password</h6>
                    </div>
                </div>
    <form method="post" action="/change-password/store" class="mt-3">
        @csrf
            <div class="d-flex justify-content-center">
                <div class="col-md-6">
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Old Password</label>
                    <input type="password" name="current_password" class="form-control @error('current_password') is-invalid @enderror" id="exampleInputEmail1"
                        aria-describedby="emailHelp">
                                  @error('current_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>Old Password Wrong</strong>
                                    </span>
                                  @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" name="new_password" class="form-control @error('new_password') is-invalid @enderror" id="exampleInputPassword1">
                                    @error('new_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">New Confirm Password</label>
                    <input type="password" name="new_confirm_password" class="form-control @error('new_confirm_password') is-invalid @enderror" id="exampleInputPassword1">
                                    @error('new_confirm_password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                </div>
                    <div class="d-flex justify-content-end mb-3">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </div>

    </form>
    </div>
    </div>
@endsection
