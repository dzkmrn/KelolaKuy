@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Checklist
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('checklist.store') }}" id="myForm" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="id_checklist">ID</label>
                        <input type="text" name="id_checklist" class="form-control" id="id_checklist" aria-describedby="id_checklist">
                    </div>
                    <div class="form-group">
                        <label for="peminjaman">Nim</label>
                        <select name="peminjaman" class="form-control">
                            @foreach ($peminjaman as $Peminjaman)
                            <option value="{{$Peminjaman->id_peminjaman}}">{{$Peminjaman->peminjam_nim}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian" aria-describedby="tanggal_pengembalian">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">Kondisi</label>
                        <input type="kondisi" class="form-control" required="required" name="kondisi" id="kondisi" aria-describedby="kondisi">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection