@extends('layout.app')

@section('title', 'Alat')

@extends('layout.main')

@section('isi')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container-fluid">
                <form class="form-left my-2" method="get" action="{{ route('searchAlat') }}">
                    <div class="form-group w-70 mb-3">
                        <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Nama Alat">
                        <button type="submit" class="btn btn-primary mb-1"><i class='fa fa-search'></i></button>
                        <a class="btn btn-success right" href="{{ route('alat.create') }}" style="margin-left:36.8%">Input Alat</a>
                    </div>
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

                        <a class="btn btn-info" href="{{ route('alat.show',$alats->id_alat) }}"><i class='fa fa-eye' style="color:snow"></i></a>
                        <a class="btn btn-primary" href="{{ route('alat.edit',$alats->id_alat) }}"><i class='fas fa-edit'></i></a>
                        @csrf
                        @method('DELETE')
                        <button type="submit" onclick="return confirm('Are you sure you want to delete {{$alats->kategori_alat}}?')" class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
                    </form>
                </td>
            </tr>
    </div>
    @endforeach
    </table>
</div>
{!! $alat ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection