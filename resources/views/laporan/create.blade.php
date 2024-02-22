@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Forms</h5>
              <div class="card">
                <div class="card-body">
                @if(count($errors) > 0)
                @foreach($errors->all() as $error)
                <div class="alert alert-warning">{{ $error }}</div>
                @endforeach
                @endif
                @if ($message = Session::get('error'))
               <div class="alert alert-warning">
                  <p>{{ $message }}</p>
               </div>
                @endif
                @if ($message = Session::get('success'))
               <div class="alert alert-success">
                  <p>{{ $message }}</p>
               </div>
                @endif
                <form action="{{ route('laporan.store') }}" method="post">
                @csrf
                <div class="mb-3">
                      <label for="nama" class="form-label">Nama Lengkap</label>
                      <input type="text" class="form-control" name="nama" id="nama">
                    </div>
                    <div class="mb-3">
                      <label for="jabatan" class="form-label">Jabatan</label>
                      <input type="text" class="form-control" name="jabatan" id="jabatan">
                    </div>
                    <div class="mb-3">
                      <label for="tanggal" class="form-label">Tanggal</label>
                      <input type="text" class="form-control datepicker" name="tanggal" id="tanggal" readonly>
                    </div>
                    <div class="mb-3">
                      <label for="laporan" class="form-label">Laporan</label>
                      <textarea class="form-control" id="laporan" name="laporan" rows="5"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection