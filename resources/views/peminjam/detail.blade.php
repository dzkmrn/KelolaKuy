@extends('layout.app')

@extends('layout.main')

@section('title', 'Detail Peminjam')

@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Peminjam
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>NIM: </b>{{$peminjam->nim}}</li>
                    <li class="list-group-item"><b>Nama Peminjam: </b>{{$peminjam->nama_peminjam}}</li>
                    <li class="list-group-item"><b>Jenis Kelamin: </b>{{$peminjam->jenis_kelamin}}</li>
                    <li class="list-group-item"><b>Prodi: </b>{{$peminjam->prodi}}</li>
                    <li class="list-group-item"><b>Kelas: </b>{{$peminjam->kelas}}</li>
                    <li class="list-group-item"><b>No Handphone: </b>{{$peminjam->no_handphone}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ url('peminjam') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection