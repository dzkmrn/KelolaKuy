@extends('layout.app')

@section('title', 'Peminjaman')

@extends('layout.mainCustomer')

@section('isi')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="card-body table-responsive p-0">
    <table class="table table-hover text-nowrap thead-dark">
        <thead>
            <tr>
                <th>ID Peminjaman</th>
                <th>Nama Peminjam</th>
                <th>Nama Alat</th>
                <th>Foto Alat</th>
                <th>Tanggal</th>
                <th>Durasi</th>
                <th>Kegiatan</th>
                <th>Status</th>
            </tr>
            @foreach ($peminjaman as $pj)
            <tr>

                <td>{{ $pj->id_peminjaman }}</td>
                <td>{{ $pj->peminjam->nama_peminjam }}</td>
                <td>{{ $pj->alat->nama_alat }}</td>
                <td><img width="100px" src="{{asset('storage/'.$pj->alat->foto_alat)}}"></td>
                <td>{{ $pj->tanggal_peminjaman}}</td>
                <td>{{ $pj->durasi_peminjaman}}</td>
                <td>{{ $pj->kegiatan }}</td>
                <td>{{ $pj->status }}</td>
            </tr>
</div>
@endforeach
</thead>
</table>
</div>
@endsection