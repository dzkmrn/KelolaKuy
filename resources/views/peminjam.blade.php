@extends('layout.app')

@section('title', 'peminjam')

@extends('layout.main')

@section('isi')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <form class="form-left my-2" method="get" action="{{ route('search') }}">
            <div class="form-group w-70 mb-3">
                <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Nama">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
                <a class="btn btn-success right" href="{{ route('peminjam.create') }}" style="margin-left:9.6cm">Input Peminjam</a>
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
            <th>NIM</th>
            <th>NAMA PEMINJAM</th>
            <th>JENIS KELAMIN</th>
            <th>PRODI</th>
            <th>KELAS</th>
            <th>NO HANDPHONE</th>
            <th width="280px">Action</th>
        </tr>
        @foreach ($peminjam as $peminjams)
        <tr>
            <td>{{ $peminjams->nim }}</td>
            <td>{{ $peminjams->nama_peminjam }}</td>
            <td>{{ $peminjams->jenis_kelamin }}</td>
            <td>{{ $peminjams->prodi }}</td>
            <td>{{ $peminjams->kelas }}</td>
            <td>{{ $peminjams->no_handphone }}</td>
            <td>
                <form action="{{ route('peminjam.destroy',$peminjams->nim) }}" method="POST">

                    <a class="btn btn-info" href="{{ route('peminjam.show',$peminjams->nim) }}">Show</a>
                    <a class="btn btn-primary" href="{{ route('peminjam.edit',$peminjams->nim) }}">Edit</a>
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </td>
        </tr>
</div>
@endforeach
</table>
{!! $peminjam ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection