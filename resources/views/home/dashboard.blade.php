@extends('layouts.master')
@section('content')
    <div class="mdc-layout-grid">
        <div class="mdc-layout-grid__inner">
             <div
                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--danger">
                    <div class="card-inner">
                        <h5 class="card-title">Saldo</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom"></h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">attach_money</i>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--success">
                    <div class="card-inner">
                        <h5 class="card-title">Daftar Donasi</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom"></h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">dvr</i>
                        </div>
                    </div>
                </div>
            </div>
            <div
                class="mdc-layout-grid__cell stretch-card mdc-layout-grid__cell--span-3-desktop mdc-layout-grid__cell--span-4-tablet">
                <div class="mdc-card info-card info-card--primary">
                    <div class="card-inner">
                        <h5 class="card-title">Summary Donasi</h5>
                        <h5 class="font-weight-light pb-2 mb-1 border-bottom"></h5>
                        <p class="tx-12 text-muted"></p>
                        <div class="card-icon-wrapper">
                            <i class="material-icons">trending_up</i>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
