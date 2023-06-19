@extends('layout.app')

@extends('layout.main')

@section('title', 'Dasbor | Admin')

@section('isi')

<!-- Preloader KelolaKuy! -->
<div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="../../dist/img/k_logo_big.png" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Main Content -->
<section class="content">
    <div class="container-fluid">
        <!-- Small boxes (Stat box) -->
        <div class="row">
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-info">
                    <div class="inner">
                        <h3>{{ $users }}</h3>

                        <p>Pengguna</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa  fa fa-users"></i>
                    </div>
                    <a class="small-box-footer">Pengguna terdaftar <i class="nav-icon fa  fa fa-users" aria-hidden="true"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-success">
                    <div class="inner">
                        <h3>{{ $alat }}</h3>

                        <p>Total alat di gudang </p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-archive"></i>
                    </div>
                    <a href="{{ url('alat') }}" class="small-box-footer">Detail alat <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-warning">
                    <div class="inner">
                        <h3>{{ $peminjam }}</h3>

                        <p>Total Peminjam</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa  fa fa-users"></i>
                    </div>
                    <a href="{{ url('peminjam') }}" class="small-box-footer">Detail peminjam <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
            <div class="col-lg-3 col-6">
                <!-- small box -->
                <div class="small-box bg-danger">
                    <div class="inner">
                        <h3>{{ $peminjamans }}</h3>

                        <p>Peminjaman Berlangsung</p>
                    </div>
                    <div class="icon">
                        <i class="nav-icon fa fa-tasks"></i>
                    </div>
                    <a href="{{ url('peminjaman') }}" class="small-box-footer">Detail Peminjaman <i class="fas fa-arrow-circle-right"></i></a>
                </div>
            </div>
            <!-- ./col -->
        </div>
        <!-- Card Riwayat Peminjaman -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Riwayat Peminjaman</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Tabel Riwayat Peminjaman -->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID Peminjaman</th>
                                    <th>Nama Peminjam</th>
                                    <th>Nama Alat</th>
                                    <th>Foto Alat</th>
                                    <th>Tanggal</th>
                                    <th>Durasi</th>
                                    <th>Kegiatan</th>
                                    <th>Status</th>
                                </tr>
                                <tr>
                                    @foreach ($peminjaman as $pj)
                                <tr>

                                    <td>{{ $pj->id_peminjaman }}</td>
                                    <td>{{ $pj->peminjam->nama_peminjam }}</td>
                                    <td>{{ $pj->alat->nama_alat }}</td>
                                    <td><img width="100px" src="{{asset('storage/'.$pj->alat->foto_alat)}}"></td>
                                    <td>{{ $pj->tanggal_peminjaman}}</td>
                                    <td>{{ $pj->durasi_peminjaman}}</td>
                                    <td>{{ $pj->kegiatan }}</td>
                                    <td>{{ $pj->status }}</td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                    <!-- Tabel Riwayat Peminjaman -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- Card Riwayat Peminjaman -->

        <!-- Card Checklist Alat -->
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Checklist Alat</h3>

                        <div class="card-tools">
                            <div class="input-group input-group-sm" style="width: 150px;">
                                <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                <div class="input-group-append">
                                    <button type="submit" class="btn btn-default">
                                        <i class="fas fa-search"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tabel Checklist Alat-->
                    <div class="card-body table-responsive p-0">
                        <table class="table table-hover text-nowrap">
                            <thead>
                                <tr>
                                    <th>ID checklist</th>
                                    <th>ID Peminjam</th>
                                    <th>Tanggal Peminjaman</th>
                                    <th>Tanggal Pengembalian</th>
                                    <th>Kondisi</th>
                                </tr>
                                <tr>
                                    @foreach ($checklist as $ch)
                                <tr>

                                    <td>{{ $ch->id_checklist }}</td>
                                    <td>{{ $ch->peminjaman->peminjam_nim }}</td>
                                    <td>{{ $ch->peminjaman->tanggal_peminjaman }}</td>
                                    <td>{{ $ch->tanggal_pengembalian}}</td>
                                    <td>{{ $ch->kondisi}}</td>
                                </tr>
                                @endforeach
                        </table>
                    </div>
                    <!-- Tabel Checklist Alat -->
                </div>
                <!-- /.card -->
            </div>
        </div>
        <!-- Card Checklist Alat -->
    </div>
    <!-- /.container-fluid -->
</section>
<!-- /.content -->
@endsection