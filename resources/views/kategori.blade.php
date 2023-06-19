@extends('layout.app')

@section('title', 'Kategori')

@extends('layout.main')

@section('isi')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container-fluid">
                <form class="form-left my-2" method="get" action="{{ route('searchKategori') }}">
                    <div class="form-group w-70 mb-3">
                        <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Kategori">
                        <button type="submit" class="btn btn-primary mb-1" style><i class='fa fa-search'></i></button>
                        <a class="btn btn-success right" href="{{ route('kategori.create') }}" style="margin-left:34.2%">Input Kategori</a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
    <div class="alert alert-success">
        <p>{{ $message }}</p>
    </div>
    @endif

    <div class="card-body table-responsive p-0">
        <table class="table table-hover text-nowrap thead-dark">
            <thead>
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

                            <a class="btn btn-info" href="{{ route('kategori.show',$kategoris->id_kategori) }}"><i class='fa fa-eye' style="color:snow"></i></a>
                            <a class="btn btn-primary" href="{{ route('kategori.edit',$kategoris->id_kategori) }}"><i class='fas fa-edit'></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete {{$kategoris->kategori_alat}}?')" class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
                            <!-- <button type="submit" class="btn btn-danger">Delete</button> -->
                        </form>
                    </td>
                </tr>
    </div>
    @endforeach
    </thead>
    </table>
</div>

{!! $kategori ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection