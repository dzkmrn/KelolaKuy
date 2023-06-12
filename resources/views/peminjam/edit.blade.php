@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Peminjam
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your i
                    nput.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('peminjam.update', $peminjam->nim) }}" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="nama_peminjam">NAMA PEMINJAM</label>
                        <input type="hidden" name="nim" class="form-control" id="nim" value="{{ $peminjam->nim }}" ariadescribedby="nim">
                        <input type="text" name="nama_peminjam" class="form-control" id="nama_peminjam" value="{{ $peminjam->nama_peminjam }}" ariadescribedby="nama_peminjam">
                    </div>
                    <div class="form-group">
                        <label for="jenis_kelamin">JENIS KELAMIN</label>
                        <select name="jenis_kelamin" class="form-control form-select-sm" id="jenis_kelamin" aria-describedby="jenis_kelamin">
                            <option value="Perempuan">Perempuan</option>
                            <option value="Laki Laki">Laki Laki</option> 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="prodi">PRODI</label>
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
                        <label for="kelas">KELAS</label>
                        <input type="text" name="kelas" class="form-control" id="kelas" value="{{ $peminjam->kelas }}" ariadescribedby="kelas">
                    </div>
                    <div class="form-group">
                        <label for="no_handphone">NO HANDPHONE</label>
                        <input type="text" name="no_handphone" class="form-control" id="no_handphone" value="{{ $peminjam->no_handphone }}" ariadescribedby="no_handphone">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection