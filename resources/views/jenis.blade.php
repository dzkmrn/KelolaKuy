@extends('layout.app')

@section('title', 'Jenis')

@extends('layout.main')

@section('isi')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="float-right my-2">
            <a class="btn btn-success" href="{{ route('jenis.create') }}"> Input Jenis</a>
        </div>
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

                <a class="btn btn-info" href="{{ route('jenis.show',$jeniss->id_jenis) }}">Show</a>
                <a class="btn btn-primary" href="{{ route('jenis.edit',$jeniss->id_jenis) }}">Edit</a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Delete</button>
            </form>
        </td>
    </tr>
</div>
    @endforeach
</table>
{!! $jenis ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection