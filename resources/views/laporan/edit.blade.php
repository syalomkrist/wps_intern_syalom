@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title fw-semibold mb-4">Edit Laporan</h5>
                    <form action="{{ route('laporan.update', $laporan->id) }}" method="post">
                        @csrf
                        {{ method_field('patch') }}
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="{{ $laporan->nama }}">
                        </div>
                        <div class="mb-3">
                            <label for="jabatan" class="form-label">Jabatan</label>
                            <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ $laporan->jabatan }}">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal" class="form-label">Tanggal</label>
                            <input type="text" class="form-control datepicker" id="tanggal" name="tanggal" value="{{ $laporan->tanggal }}" readonly>
                        <p>*Harap masukkan kembali tanggal setiap edit data</p>
                        </div>
                        <div class="mb-3">
                            <label for="laporan" class="form-label">Laporan</label>
                            <textarea class="form-control" id="laporan" name="laporan" rows="5">{{ $laporan->laporan }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Update</button>
                        <a href="{{ route('laporan.index') }}" class="btn btn-secondary">Batal</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
