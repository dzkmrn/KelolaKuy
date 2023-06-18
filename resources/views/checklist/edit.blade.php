@extends('layout.main')

@section('isi')
<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Checklist
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your i
                    nput.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('checklist.update', $checklist->id_checklist) }}" id="myForm" enctype="multipart/form-data">
                    @method('PUT')
                    @csrf
                    <div class="form-group">
                        <label for="peminjaman">NIM Peminjam</label>
                        <select name="peminjaman" class="form-control">
                            @foreach ($peminjaman as $Peminjaman)
                            <option value="{{$Peminjaman->id_peminjaman}}" {{$checklist->peminjaman->peminjam->nim == $Peminjaman->peminjam->nim ? 'selected' :''}}>{{$Peminjaman->peminjam_nim}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pengembalian">Tanggal Pengembalian</label>
                        <input type="date" name="tanggal_pengembalian" class="form-control" id="tanggal_pengembalian" value="{{ $checklist->tanggal_pengembalian }}" ariadescribedby="tanggal_pengembalian">
                    </div>
                    <div class="form-group">
                        <label for="kondisi">kondisi</label>
                        <select name="kondisi" class="form-control form-select-sm" id="kondisi" aria-describedby="kondisi">
                            <option value="Normal">Normal</option> 
                            <option value="Rusak">Rusak</option>
                            <option value="Hilang">Hilang</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection