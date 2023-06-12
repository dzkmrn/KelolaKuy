@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Kategori
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
                <form method="post" action="{{ route('kategori.update', $kategori->id_kategori) }}" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="kategori_alat">Kategori Alat</label>
                        <input type="hidden" name="id_kategori" class="form-control" id="id_kategori" value="{{ $kategori->id_kategori }}" ariadescribedby="id_kategori">
                        <input type="text" name="kategori_alat" class="form-control" id="kategori_alat" value="{{ $kategori->kategori_alat }}" ariadescribedby="id_kategori">
                    </div>
                    <div class="form-group">
                        <label for="foto">Gambar</label>
                        <input type="file" class="form-control" required="required" name="foto" value="{{$kategori->foto}}"></br>
                        <img width="150px" src="{{asset('storage/'.$kategori->foto)}}">
                    </div>
                    <div class="form-group">
                        <label for="dekskripsi_kategori">Deskripsi Kategori</label><br>
                        <input type="text" name="dekskripsi_kategori" class="form-control" id="dekskripsi_kategori" value="{{ $kategori->dekskripsi_kategori }}" aria-describedby="dekskripsi_kategori">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection