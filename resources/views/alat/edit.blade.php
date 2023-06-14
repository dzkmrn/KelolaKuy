@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Alat
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
                <form method="post" action="{{ route('alat.update', $alat->id_alat) }}" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="kategori">ID Kategori</label>
                        <select name="kategori" class="form-control">
                            @foreach ($kategori as $Kategori)
                            <option value="{{$Kategori->id_kategori}}">{{$Kategori->kategori_alat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="jenis">ID Jenis</label>
                        <select name="jenis" class="form-control">
                            @foreach ($jenis as $Jenis)
                            <option value="{{$Jenis->id_jenis}}">{{$Jenis->jenis_alat}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="nama_alat">Nama Alat</label>
                        <input type="text" name="nama_alat" class="form-control" id="nama_alat" value="{{ $alat->nama_alat }}" ariadescribedby="nama_alat">
                        <input type="hidden" name="id_alat" class="form-control" id="id_alat" value="{{ $alat->id_alat }}" ariadescribedby="id_alat">
                    </div>
                    <!-- UPDATE - cuman update require ke not required -->
                    <div class="form-group">
                        <label for="foto_alat">Gambar</label>
                        <input type="file" class="form-control" name="foto_alat" value="{{$alat->foto_alat}}"></br>
                        <img width="150px" src="{{asset('storage/'.$alat->foto_alat)}}">
                    </div>
                    <div class="form-group">
                        <label for="merk_alat">Merk Alat</label>
                        <input type="text" name="merk_alat" class="form-control" id="merk_alat" value="{{ $alat->merk_alat }}" ariadescribedby="merk_alat">
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