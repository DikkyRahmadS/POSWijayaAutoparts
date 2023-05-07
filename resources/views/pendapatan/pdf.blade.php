<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">  
</head>
<body>
    <h4 class="text-center">Laporan Pendapatan</h4>
    <h5 class="text-center">Tanggal {{ tanggal_indonesia($awal, false) }} s/d Tanggal {{ tanggal_indonesia($akhir, false) }}</h5>
    <br>
    <table class="table table-striped">
        <thead>
            <tr>
                <th width="5%" scope="col">No</th>
                <th scope="col">Tanggal</th>
                <th scope="col">Penjualan</th>
                <th scope="col">Pembelian</th>
                <th scope="col">Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
                <tr>
                    @foreach ($row as $col)
                        <td>{{ $col }}</td>
                    @endforeach
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>