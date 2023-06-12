<html>

<head>
    <title>Laporan Checklist Invetarisasi</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
</head>

<body>
    <div class="container mt-5">
        <div class="row justify-content-center align-items-center">
            <div style="text-align:center">
                <h4>LAPORAN CHECKLIST INVENTARISASI OPA GANENDRA GIRI</h4>
            </div><br>
            <table class="table-responsive">
                <table class="table table-bordered">
                    <tr>
                        <th>ID checklist</th>
                        <th>ID Peminjaman</th>
                        <th>Tanggal Peminjaman</th>
                        <th>Tanggal Pengembalian</th>
                        <th>Kondisi</th>
                    </tr>
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
            </table>
        </div>
    </div>
    </div>
</body>

</html>