<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Supplier</title>
    <style>
        /* Custom CSS styles */
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
            font-size: 24px;
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        th,
        td {
            padding: 8px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #f5f5f5;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
</head>

<body>
    <h1>Laporan Supplier Wijaya Autopart</h1>
    <table>
        <thead>
            <tr>
                <th> No </th>
                <th>Nama</th>
                <th>Alamat</th>
                <th>No hp </th>
                <th>Produk supply </th>
                <th>Stok </th>
            </tr>
        </thead>
        @php
            $i = 1;
        @endphp
        <tbody>
            @foreach ($pembeliansDetail as $pembelianDetail)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $pembelianDetail->pembelian->supplier->nama }}</td>
                    <td>{{ $pembelianDetail->pembelian->supplier->alamat }}</td>
                    <td>{{ $pembelianDetail->pembelian->supplier->no_hp }}</td>
                    <td>{{ $pembelianDetail->produk->nama_produk }}</td>
                    <td>{{ $pembelianDetail->produk->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
