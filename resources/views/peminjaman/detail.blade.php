@extends('layout.app')

@extends('layout.main')

@section('title', 'Detail Peminjaman')

@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail peminjaman
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID peminjaman: </b>{{$peminjaman->id_peminjaman}}</li>
                    <li class="list-group-item"><b>Nama Peminjam: </b>{{$peminjaman->peminjam->nama_peminjam}}</li>
                    <li class="list-group-item"><b>Nama Alat: </b>{{$peminjaman->alat->nama_alat}}</li>
                    <li class="list-group-item"><b>Foto Alat: </b><img width="100px" src="{{asset('storage/'.$peminjaman->alat->foto_alat)}}"></li>
                    <li class="list-group-item"><b>Tanggal peminjaman: </b>{{$peminjaman->tanggal_peminjaman}}</li>
                    <li class="list-group-item"><b>Durasi peminjaman: </b>{{$peminjaman->durasi_peminjaman}}</li>
                    <li class="list-group-item"><b>Kegiatan: </b>{{$peminjaman->kegiatan}}</li>
                    <li class="list-group-item"><b>Status: </b>{{$peminjaman->status}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ url('peminjaman') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection