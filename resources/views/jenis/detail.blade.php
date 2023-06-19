@extends('layout.app')

@extends('layout.main')

@section('title', 'Detail Jenis')

@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail jenis
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Jenis: </b>{{$jenis->id_jenis}}</li>
                    <li class="list-group-item"><b>Jenis: </b>{{$jenis->jenis_alat}}</li>
                    <li class="list-group-item"><b>Deskripsi Jenis: </b>{{$jenis->dekskripsi_jenis}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ url('jenis') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection