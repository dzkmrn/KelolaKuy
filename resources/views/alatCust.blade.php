@extends('layout.app')

@section('title', 'Alat')

@extends('layout.mainCustomer')

@section('isi')

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif

<div class="container-md">
<div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container-fluid">
                <form class="form-left my-2" method="get" action="{{ route('searchCust') }}">
                    <div class="form-group w-50">
                        <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Nama Alat">
                        <button type="submit" class="btn btn-primary mb-1"><i class='fa fa-search'></i></button>
                    </div>
            </div>
            </form>
        </div>
    </div>
<table class="table table-bordered">
    <tr>
        <th>ID Alat</th>
        <th>Kategori</th>
        <th>Jenis</th>
        <th>Nama Alat</th>
        <th>Foto Alat</th>
        <th>Merk Alat</th>
        <th>Kondisi Alat</th>
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
    </tr>
</div>
    @endforeach
</table>
@endsection