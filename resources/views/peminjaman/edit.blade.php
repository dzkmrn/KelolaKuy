@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Peminjaman
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
                <form method="post" action="{{ route('peminjaman.update', $peminjaman->id_peminjaman) }}" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="peminjam">Nama Peminjam</label>
                        <select name="peminjam" class="form-control">
                            @foreach ($peminjam as $Peminjam)
                            <option value="{{$Peminjam->nim}}">{{$Peminjam->nama_peminjam}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alat">Nama Alat</label>
                        <select name="alat" class="form-control">
                            @foreach ($alat as $Alat)
                            <option value="{{$Alat->id_alat}}">{{$Alat->nama_alat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_peminjaman">Tanggal peminjaman</label>
                        <input type="date" name="tanggal_peminjaman" class="form-control" id="tanggal_peminjaman" value="{{ $peminjaman->tanggal_peminjaman }}" ariadescribedby="tanggal_peminjaman">
                        <input type="hidden" name="id_peminjaman" class="form-control" id="id_peminjaman" value="{{ $peminjaman->id_peminjaman }}" ariadescribedby="id_peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="durasi_peminjaman">durasi peminjaman</label>
                        <input type="durasi_peminjaman" name="durasi_peminjaman" class="form-control" id="durasi_peminjaman" value="{{ $peminjaman->durasi_peminjaman }}" ariadescribedby="durasi_peminjaman">
                    </div>
                    <div class="form-group">
                        <label for="kegiatan">kegiatan</label>
                        <input type="text" name="kegiatan" class="form-control" id="kegiatan" value="{{ $peminjaman->kegiatan }}" ariadescribedby="kegiatan">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control form-select-sm" id="status" ariadescribedby="status">
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