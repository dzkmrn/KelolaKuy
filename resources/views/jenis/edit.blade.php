@extends('layout.app')

@extends('layout.main')

@section('title', 'Ubah Jenis')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Jenis
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
                <form method="post" action="{{ route('jenis.update', $jenis->id_jenis) }}" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="jenis_alat">Jenis Alat</label>
                        <input type="hidden" name="id_jenis" class="form-control" id="id_jenis" value="{{ $jenis->id_jenis }}" ariadescribedby="id_jenis">
                        <input type="text" name="jenis_alat" class="form-control" id="jenis_alat" value="{{ $jenis->jenis_alat }}" ariadescribedby="id_jenis">
                    </div>
                    <div class="form-group">
                        <label for="dekskripsi_jenis">Deskripsi Jenis</label><br>
                        <input type="text" name="dekskripsi_jenis" class="form-control" id="dekskripsi_jenis" value="{{ $jenis->dekskripsi_jenis }}" aria-describedby="dekskripsi_jenis">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection