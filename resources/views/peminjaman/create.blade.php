@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Peminjaman
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
                <form method="post" action="{{ route('peminjaman.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_peminjaman">ID</label>
                        <input type="text" name="id_peminjaman" class="form-control" id="id_peminjaman" aria-describedby="id_peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="peminjam">Nama Peminjam</label>
                        <select name="peminjam" class="form-control">
                            @foreach ($peminjam as $Peminjam)
                            <option value="{{$Peminjam->nim}}">{{$Peminjam->nama_peminjam}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                    <label for="alat">Alat</label>
                        <select name="alat" class="form-control">
                            @foreach ($alat as $Alat)
                            <option value="{{$Alat->id_alat}}">{{$Alat->nama_alat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_peminjaman">Tanggal</label>
                        <input type="date" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman" aria-describedby="tanggal_peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="durasi_peminjaman">Durasi</label>
                        <input type="durasi_peminjaman" class="form-control" required="required" name="durasi_peminjaman" id="durasi_peminjaman" aria-describedby="durasi_peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">Kegiatan</label>
                        <input type="kegiatan" name="kegiatan" class="form-control" id="kegiatan" aria-describedby="kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control form-select-sm" id="status"ariadescribedby="status">
                            <option value="sedang diproses">sedang diproses</option>
                            <option value="disetujui">disetujui</option>
                            <option value="ditolak">ditolak</option> 
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection