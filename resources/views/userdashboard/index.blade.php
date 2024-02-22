@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
  <div class="card-body">
    <div class="row">
      <div class="card">
        <img src="{{ asset('images/products/wps.png') }}" class="card-img-top" alt="...">
            <div class="card-body">
              <h5 class="card-title">Dashboard Laporan Karyawan</h5>
              <p class="card-text">Selamat datang, Silahkan isi laporan harian anda.</p>
              <a href="#" class="btn btn-primary">Isi Laporan</a>
            </div>
      </div>
    </div>
  </div>
</div>
@endsection