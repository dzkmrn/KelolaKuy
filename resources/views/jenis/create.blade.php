@extends('layout.app')

@extends('layout.main')

@section('title', 'Masukkan Jenis')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Jenis
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
                <form method="post" action="{{ route('jenis.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_jenis">ID</label>
                        <input type="text" name="id_jenis" class="form-control" id="id_jenis" aria-describedby="id_jenis">
                    </div>
                    <div class="form-group">
                        <label for="jenis_alat">Jenis</label>
                        <input type="jenis_alat" name="jenis_alat" class="form-control" id="jenis_alat" aria-describedby="jenis_alat">
                    </div>
                    <div class="form-group">
                        <label for="dekskripsi_jenis">Deskripsi</label>
                        <input type="dekskripsi_jenis" name="dekskripsi_jenis" class="form-control" id="dekskripsi_jenis" aria-describedby="dekskripsi_jenis">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection