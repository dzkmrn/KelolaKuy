@extends('layout.app')

@section('title', 'Peminjaman')

@extends('layout.main')

@section('isi')
<div class="container-fluid">
<div class="row">
    <div class="col-lg-12 margin-tb">
        <form class="form-left my-2" method="get" action="{{ route('searchPeminjaman') }}">
            <div class="form-group w-70 mb-3">
                <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Status">
                <button type="submit" class="btn btn-primary mb-1"><i class='fa fa-search'></i></button>
            </div>
        </form>
    </div>
</div>

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
        <th width="140px">Action</th>
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
        <td>
            <form action="{{ route('peminjaman.destroy',$pj->id_peminjaman) }}" method="POST">
                <a class="btn btn-info" href="{{ route('peminjaman.show',$pj->id_peminjaman) }}"><i class='fa fa-eye' style="color:snow"></i></a>
                <a class="btn btn-primary" href="{{ route('peminjaman.edit',$pj->id_peminjaman) }}"><i class='fas fa-edit'></i></a>
                @csrf
            </form>
        </td>
    </tr>
</div>
    @endforeach
</thead>
</table>
</div>
{!! $peminjaman ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection