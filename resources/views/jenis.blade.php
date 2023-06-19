@extends('layout.app')

@section('title', 'Jenis')

@extends('layout.main')

@section('isi')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <form class="form-left my-2" method="get" action="{{ route('searchJenis') }}">
                <div class="container-fluid">
                    <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan Jenis">
                    <button type="submit" class="btn btn-primary mb-1"><i class='fa fa-search'></i></button>
                    <a class="btn btn-success right" href="{{ route('jenis.create') }}" style="margin-left:36.4%">Input Jenis</a>
                </div>
            </form>
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
                    <th>JENIS ALAT</th>
                    <th>DESKRIPSI ALAT</th>
                    <th width="280px">Action</th>
                </tr>
                @foreach ($jenis as $jeniss)
                <tr>
                    <td>{{ $jeniss->id_jenis }}</td>
                    <td>{{ $jeniss->jenis_alat }}</td>
                    <td>{{ $jeniss->dekskripsi_jenis }}</td>
                    <td>
                        <form action="{{ route('jenis.destroy',$jeniss->id_jenis) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('jenis.show',$jeniss->id_jenis) }}"><i class='fa fa-eye' style="color:snow"></i></a>
                            <a class="btn btn-primary" href="{{ route('jenis.edit',$jeniss->id_jenis) }}"><i class='fas fa-edit'></i></a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" onclick="return confirm('Are you sure you want to delete {{$jeniss->jenis_alat}}?')" class="btn btn-danger"><i class='far fa-trash-alt'></i></button>
                        </form>
                    </td>
                </tr>
    </div>
    @endforeach
    </thead>
    </table>
    <div>
        {!! $jenis ->withQueryString()->links('pagination::bootstrap-5') !!}
        @endsection