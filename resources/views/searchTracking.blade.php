@extends('layout.app')

@section('title', 'Peminjaman')

@extends('layout.mainCustomer')

@section('isi')
<div class="container-fluid">
    <div class="d-flex flex-column" style="align-items: center;">
        <div class="p-2">
            <form class="form-left my-2" method="get" action="{{ route('tracking') }}">
                    <div class="p-2">
                    <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan ID">
                    </div>
                    <div class="p-2">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    <a class="btn btn-success" href="{{ route('tracking.create') }}"> Input Peminjaman</a>
                    </div>  
            </form>
        </div>
    </div>
</div>

@endsection