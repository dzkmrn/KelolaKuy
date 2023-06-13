@extends('layout.app')

@section('title', 'Peminjaman')

@extends('layout.main')

@section('isi')
<!-- UPDATE - PEMINJAMAN BLADE -->
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('peminjaman.create') }}"> Input Peminjaman</a>
        </div>
    </div>
</div> -->

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container-md">
<table class="table table-bordered">
    <tr>
        <th>ID Peminjaman</th>
        <th>Nama Peminjam</th>
        <th>Nama Alat</th>
        <th>Foto Alat</th>
        <th>Tanggal</th>
        <th>Durasi</th>
        <th>Kegiatan</th>
        <th>Status</th>
        <th width="280px">Action</th>
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

                <a class="btn btn-info" href="{{ route('peminjaman.show',$pj->id_peminjaman) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('peminjaman.edit',$pj->id_peminjaman) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
</div>
    @endforeach
</table>
{!! $peminjaman ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection