@extends('layout.app')

@section('title', 'Alat')

@extends('layout.main')

@section('isi')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <form class="form-left my-2" method="get" action="{{ route('searchAlat') }}">
            <div class="form-group w-70 mb-3">
                <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Nama">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
                <a class="btn btn-success right" href="{{ route('alat.create') }}" style="margin-left:9.6cm">Input Alat</a>
            </div>
        </form>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container-md">
<table class="table table-bordered">
    <tr>
        <th>ID Alat</th>
        <th>Kategori</th>
        <th>Jenis</th>
        <th>Nama Alat</th>
        <th>Foto Alat</th>
        <th>Merk Alat</th>
        <th>Kondisi Alat</th>
        <th width="280px">Action</th>
    </tr>
    @foreach ($alat as $alats)
    <tr>

        <td>{{ $alats->id_alat }}</td>
        <td>{{ $alats->kategori->kategori_alat }}</td>
        <td>{{ $alats->jenis->jenis_alat }}</td>
        <td>{{ $alats->nama_alat }}</td>
        <td><img width="100px" src="{{asset('storage/'.$alats->foto_alat)}}"></td>
        <td>{{ $alats->merk_alat }}</td>
        <td>{{ $alats->kondisi_alat }}</td>
        <td>
            <form action="{{ route('alat.destroy',$alats->id_alat) }}" method="POST">

                <a class="btn btn-info" href="{{ route('alat.show',$alats->id_alat) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('alat.edit',$alats->id_alat) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
</div>
    @endforeach
</table>
{!! $alat ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection