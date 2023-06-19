@extends('layout.app')

@extends('layout.main')

@section('title', 'Masukkan Peminjam')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Peminjam
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
                <form method="post" action="{{ route('peminjam.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nim">NIM</label>
                        <input type="text" name="nim" class="form-control" id="nim" aria-describedby="nim">
                    </div>
                    <div class="form-group">
                        <label for="nama_peminjam">Nama Peminjam</label>
                        <input type="nama_peminjam" name="nama_peminjam" class="form-control" id="nama_peminjam" aria-describedby="nama_peminjam">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control form-select-sm" id="jenis_kelamin" aria-describedby="jenis_kelamin">
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki Laki">Laki Laki</option> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodi">Prodi</label>
                        <select name="prodi" class="form-control form-select-sm" id="prodi" aria-describedby="prodi">
                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                            <option value="Teknik Elektro">Teknik Elektro</option> 
                            <option value="Teknik Kimia">Teknik Kimia</option>
                            <option value="Teknik Mesin">Teknik Mesin</option>
                            <option value="Teknik Sipil">Teknik Sipil</option> 
                            <option value="Akuntansi">Akuntansi</option>
                            <option value="Akuntansi">Administrasi Niaga</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="kelas">Kelas</label>
                        <input type="kelas" name="kelas" class="form-control" id="kelas" aria-describedby="kelas">
                    </div>
                    <div class="form-group">
                        <label for="no_handphone">No Handphone</label>
                        <input type="no_handphone" name="no_handphone" class="form-control" id="no_handphone" aria-describedby="no_handphone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection