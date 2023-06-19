@extends('layout.app')

@section('title', 'Checklist')

@extends('layout.main')

@section('isi')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="container-fluid" style="margin-left:-77.4%;">
                <div class="float-right my-2">
                    <a class="btn btn-success" href="{{ route('checklist.create') }}"> Input Checklist</a>
                    <a href="cetak" class="btn btn-warning">
                        <i class="nav-icon fa fa-print"></i>
                        Cetak PDF</a>
                </div>
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
                    <th>ID checklist</th>
                    <th>NIM Peminjam</th>
                    <th>Tanggal Peminjaman</th>
                    <th>Tanggal Pengembalian</th>
                    <th>Kondisi</th>
                    <th width="140px">Action</th>
                </tr>
                @foreach ($checklist as $ch)
                <tr>

                    <td>{{ $ch->id_checklist }}</td>
                    <td>{{ $ch->peminjaman->peminjam_nim }}</td>
                    <td>{{ $ch->peminjaman->tanggal_peminjaman }}</td>
                    <td>{{ $ch->tanggal_pengembalian}}</td>
                    <td>{{ $ch->kondisi}}</td>
                    <td>
                        <form action="{{ route('checklist.destroy',$ch->id_checklist) }}" method="POST">

                            <a class="btn btn-info" href="{{ route('checklist.show',$ch->id_checklist) }}"><i class='fa fa-eye' style="color:snow"></i></a>
                            <a class="btn btn-primary" href="{{ route('checklist.edit',$ch->id_checklist) }}"><i class='fas fa-edit'></i></a>
                            @csrf
                        </form>
                    </td>
                </tr>
    </div>
    @endforeach
    </thead>
    </table>
</div><br>

{!! $checklist ->withQueryString()->links('pagination::bootstrap-5') !!}
@endsection