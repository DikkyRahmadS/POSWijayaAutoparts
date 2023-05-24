<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Produk</title>
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
    <h1>Laporan Produk Wijaya Autopart</h1>
    <table>
        <thead>
            <tr>
                <th> No </th>
                <th>Kode Produk</th>
                <th>Nama Produk</th>
                <th>Kategori </th>
                <th>Berat </th>
                <th>Harga Jual</th>
                <th>Stok</th>
                <th></th>
            </tr>
        </thead>
        @php
            $i = 1;
        @endphp
        <tbody>
            @foreach ($produks as $produk)
                <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $produk->kode_produk }}</td>
                    <td>{{ $produk->nama_produk }}</td>
                    <td>{{ $produk->kategori->nama_kategori }}</td>
                    <td>{{ $produk->berat }} g</td>
                    <td>Rp. {{ format_uang($produk->harga_jual) }}</td>
                    <td>{{ $produk->stok }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
