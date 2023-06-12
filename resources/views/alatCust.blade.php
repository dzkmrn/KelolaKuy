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