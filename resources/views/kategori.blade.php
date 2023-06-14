@extends('layout.app')

@section('title', 'Kategori')

@extends('layout.main')

@section('isi')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <form class="form-left my-2" method="get" action="{{ route('searchKategori') }}">
            <div class="form-group w-70 mb-3">
                <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Kategori">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
                <a class="btn btn-success right" href="{{ route('kategori.create') }}" style="margin-left:9.6cm">Input Kategori</a>
            </div>
        </form>
    </div>
</div>
<!-- <div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-right my-2">
        <form class="form-left my-2" method="get" action="{{ route('searchKategori') }}">
            <div class="form-group w-70 mb-3">
                <input type="text" name="searchKategori" class="form-control w-50 d-inline" id="searchKategori" placeholder="Masukkan Kategori">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
            <a class="btn btn-success" href="{{ route('kategori.create') }}"> Input Kategori</a>
        </div>
    </div>
</div> -->

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container-md">
    <table class="table table-bordered">
        <tr>
            <th>ID</th>
            <th>KATEGORI ALAT</th>
            <th>FOTO</th>
            <th>DESKRIPSI ALAT</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($kategori as $kategoris)
        <tr>

            <td>{{ $kategoris->id_kategori }}</td>
            <td>{{ $kategoris->kategori_alat }}</td>
            <td><img width="100px" src="{{asset('storage/'.$kategoris->foto)}}"></td>
            <td>{{ $kategoris->dekskripsi_kategori }}</td>
            <td>
                <form action="{{ route('kategori.destroy',$kategoris->id_kategori) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('kategori.show',$kategoris->id_kategori) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('kategori.edit',$kategoris->id_kategori) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" onclick="return confirm('Are you sure you want to delete {{$kategoris->kategori_alat}}?')"  class="btn btn-danger">Delete</button>
                    <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                </form>
            </td>
        </tr>
</div>
@endforeach
</table>
{!! $kategori ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection