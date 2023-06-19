@extends('layout.app')

@section('title', 'Tracking')

@extends('layout.mainCustomer')

@section('isi')
<div class="row justify-content-center">
    <div class="col-8">
        <table class="table table-borderless table responsive">
            <tr>
                <form class="form-left my-2" method="get" action="{{ route('tracking') }}">
                    <td>
                        <input name="search" class="form-control text-center" id="search" placeholder="Masukkan ID">
                    </td>
            </tr>
            <tr>
                <td class="text-center">
                    <button type="submit" class="btn btn-primary mb-1">Cari</button>
                    <a class="btn btn-success mb-1" href="{{ route('tracking.create') }}"> Input Peminjaman</a>
                </td>
            </tr>
            </form>
        </table>
    </div>
</div>

@endsection