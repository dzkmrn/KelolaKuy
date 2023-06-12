@extends('layout.main')

@section('isi')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Detail Kategori
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>ID Kategori: </b>{{$kategori->id_kategori}}</li>
                    <li class="list-group-item"><b>Kategori: </b>{{$kategori->kategori_alat}}</li>
                    <li class="list-group-item"><img width="100px" src="{{asset('storage/'.$kategori->foto)}}"></li>
                    <li class="list-group-item"><b>Deskripsi Kategori: </b>{{$kategori->dekskripsi_kategori}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt3" href="{{ url('kategori') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection