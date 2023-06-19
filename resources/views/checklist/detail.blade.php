@extends('layout.app')

@extends('layout.main')

@section('title', 'Detail Checklist')

@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Checklist
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Checklist: </b>{{$checklist->id_checklist}}</li>
                    <li class="list-group-item"><b>NIM Peminjam: </b>{{$checklist->peminjaman->peminjam_nim}}</li>
                    <li class="list-group-item"><b>Tanggal Peminjaman: </b>{{$checklist->peminjaman->tanggal_peminjaman}}</li>
                    <li class="list-group-item"><b>Tanggal Pengembalian: </b>{{$checklist->tanggal_pengembalian}}</li>
                    <li class="list-group-item"><b>Kondisi: </b>{{$checklist->kondisi}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ url('checklist') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection