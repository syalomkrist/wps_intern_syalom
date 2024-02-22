@extends('layouts.dashboard')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 d-flex align-items-stretch">
            <div class="card w-100">
                <div class="card-body p-4">
                    <h5 class="card-title fw-semibold mb-4">Laporan</h5>
                    <div class="table-responsive">
                        <div class="card-tools">
                            <a href="{{ route('laporan.create') }}" class="btn btn-sm btn-primary">Tambah Laporan Baru</a>
                        </div>
                        <table class="table text-nowrap mb-0 align-middle w-100">
                            <thead class="text-dark fs-4">
                                <tr>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">No</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Nama</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Jabatan</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Tanggal</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Laporan</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Status</h6>
                                    </th>
                                    <th class="border-bottom-0">
                                        <h6 class="fw-semibold mb-0">Action</h6>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($laporans as $laporan)
                                <tr>
                                    <td class="border-bottom-0"><h6 class="fw-semibold mb-0">{{ $loop->iteration }}</h6></td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $laporan->nama }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <h6 class="fw-semibold mb-1">{{ $laporan->jabatan }}</h6>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $laporan->tanggal }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                        <p class="mb-0 fw-normal">{{ $laporan->laporan }}</p>
                                    </td>
                                    <td class="border-bottom-0">
                                    <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="statusDropdown{{ $laporan->id }}" data-bs-toggle="dropdown" aria-expanded="false">
                                    Pilih Status
                                    </button>
                                        <ul class="dropdown-menu" aria-labelledby="statusDropdown{{ $laporan->id }}">
                                    <!-- Opsi untuk menyetujui -->
                                    <li>
                                    <form action="{{ route('laporan.approve', $laporan->id) }}" method="POST">
                                    @csrf
                                        <button class="dropdown-item" type="submit">Setujui</button>
                                    </form>
                                </li>
                                    <!-- Opsi untuk menolak -->
                                <li>
                                    <form action="{{ route('laporan.reject', $laporan->id) }}" method="POST">
                                    @csrf
                                        <button class="dropdown-item" type="submit">Tolak</button>
                                    </form>
                                    </li>
                                    </ul>
                                    </div>
                                    </td>
                                    </td>
                                    <td class="border-bottom-0">
                                        <!-- Tombol Edit dan Delete -->
                                        <form action="{{ route('laporan.edit', $laporan->id) }}" method="get" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-primary mb-2">Edit</button>
                                        </form>
                                        <form action="{{ route('laporan.destroy', $laporan->id) }}" method="post" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger mb-2">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- JavaScript -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $(document).ready(function() {
        // Event listener untuk tombol "Setujui"
        $('.approve-btn').click(function(e) {
            e.preventDefault();
            var laporanId = $(this).data('laporan-id');
            
            // Kirim permintaan asinkron ke server menggunakan AJAX
            $.ajax({
                url: '/laporan/' + laporanId + '/approve',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Perbarui tampilan secara langsung
                    $('#statusDropdown' + laporanId + ' button').text('Disetujui');
                }
            });
        });

        // Event listener untuk tombol "Tolak"
        $('.reject-btn').click(function(e) {
            e.preventDefault();
            var laporanId = $(this).data('laporan-id');
            
            // Kirim permintaan asinkron ke server menggunakan AJAX
            $.ajax({
                url: '/laporan/' + laporanId + '/reject',
                type: 'POST',
                data: {
                    _token: '{{ csrf_token() }}'
                },
                success: function(response) {
                    // Perbarui tampilan secara langsung
                    $('#statusDropdown' + laporanId + ' button').text('Ditolak');
                }
            });
        });
    });
</script>
@endsection
