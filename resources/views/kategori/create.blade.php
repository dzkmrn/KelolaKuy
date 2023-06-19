@extends('layout.app')

@extends('layout.main')

@section('title', 'Masukkan Kategori')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Kategori
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('kategori.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_kategori">ID</label>
                        <input type="text" name="id_kategori" class="form-control" id="id_kategori" aria-describedby="id_kategori">
                    </div>
                    <div class="form-group">
                        <label for="kategori_alat">Kategori</label>
                        <input type="kategori_alat" name="kategori_alat" class="form-control" id="kategori_alat" aria-describedby="kategori_alat">
                    </div>
                    <div class="form-group">
                        <label for="foto">Foto</label>
                        <input type="file" class="form-control" required="required" name="foto" id="foto" aria-describedby="foto">
                    </div>
                    <div class="form-group">
                        <label for="dekskripsi_kategori">Deskripsi</label>
                        <input type="dekskripsi_kategori" name="dekskripsi_kategori" class="form-control" id="dekskripsi_kategori" aria-describedby="dekskripsi_kategori">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection