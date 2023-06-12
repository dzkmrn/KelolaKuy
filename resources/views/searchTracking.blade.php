@extends('layout.app')

@section('title', 'Peminjaman')

@extends('layout.mainCustomer')

@section('isi')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <form class="form-left my-2" method="get" action="{{ route('tracking') }}">
            <div class="form-group w-70 mb-3">
                <input type="text" name="search" class="form-control w-50 d-inline" id="search" placeholder="Masukkan ID">
                <button type="submit" class="btn btn-primary mb-1">Cari</button>
                <a class="btn btn-success" href="{{ route('tracking.create') }}"> Input Peminjaman</a>
        </form>
    </div>
</div>
            </div>
        </form>
    </div>
</div>
@endsection