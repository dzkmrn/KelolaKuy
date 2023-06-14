@extends('layout.main')

@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Alat
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Alat: </b>{{$alat->id_alat}}</li>
                    <li class="list-group-item"><b>ID Kategori: </b>{{$alat->kategori->kategori_alat}}</li>
                    <li class="list-group-item"><b>ID Jenis: </b>{{$alat->jenis->jenis_alat}}</li>
                    <li class="list-group-item"><b>Nama Alat: </b>{{$alat->nama_alat}}</li>
                    <li class="list-group-item"><b>Foto Alat: </b><br><img width="100px" src="{{asset('storage/'.$alat->foto_alat)}}"></li>
                    <li class="list-group-item"><b>Merk Alat: </b>{{$alat->merk_alat}}</li>
                    <li class="list-group-item"><b>Kondisi Alat: </b>{{$alat->kondisi_alat}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ url('alat') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection