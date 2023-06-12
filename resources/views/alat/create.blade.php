@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah alat
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
                <form method="post" action="{{ route('alat.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_alat">ID</label>
                        <input type="text" name="id_alat" class="form-control" id="id_alat" aria-describedby="id_alat">
                    </div>
                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control">
                            @foreach ($kategori as $Kategori)
                            <option value="{{$Kategori->id_kategori}}">{{$Kategori->kategori_alat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis">Jenis</label>
                        <select name="jenis" class="form-control">
                            @foreach ($jenis as $Jenis)
                            <option value="{{$Jenis->id_jenis}}">{{$Jenis->jenis_alat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_alat">Nama Alat</label>
                        <input type="nama_alat" name="nama_alat" class="form-control" id="nama_alat" aria-describedby="nama_alat">
                    </div>
                    <div class="form-group">
                        <label for="foto_alat">Foto Alat</label>
                        <input type="file" class="form-control" required="required" name="foto_alat" id="foto_alat" aria-describedby="foto_alat">
                    </div>
                    <div class="form-group">
                        <label for="merk_alat">Merk Alat</label>
                        <input type="merk_alat" name="merk_alat" class="form-control" id="merk_alat" aria-describedby="merk_alat">
                    </div>
                    <div class="form-group">
                        <label for="kondisi_alat">Kondisi Alat</label>
                        <select name="kondisi_alat" class="form-control form-select-sm" id="kondisi_alat" aria-describedby="kondisi_alat">
                            <option value="Normal">Normal</option> 
                            <option value="Rusak">Rusak</option>
                            <option value="Hilang">Hilang</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection