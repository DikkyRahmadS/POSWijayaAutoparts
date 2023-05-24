
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
    <h1>Laporan Penjualan Wijaya Autopart</h1>
    <table>
        <thead>
            <tr>
                <th class=> No </th>
                <th class=>Tanggal Transaksi</th>
                <th class=>Id Penjualan</th>
                <th class=>Nama Produk</th>
                <th class=>Total Item </th>
                <th class=>Total Harga </th>
                <th class=>Diskon</th>
                <th class=>Bayar</th>
                <th class=></th>
            </tr>
        </thead>
        @php
            $i = 1;
        @endphp
        <tbody>

            @foreach ($penjualansDetail as $penjualanDetail)
                        <tr>
                            <td>{{ $i++ }}</td>
                            <td>{{ date('d M Y', strtotime($penjualanDetail->created_at)) }}</td>
                            <td>{{ $penjualanDetail->penjualan_id }}</td>
                            <td>{{ $penjualanDetail->produk->nama_produk }}</td>
                            <td>{{ $penjualanDetail->jumlah }}</td>
                            <td>{{ $penjualanDetail->subtotal }}</td>
                            <td>{{ $penjualanDetail->penjualan->diskon }}</td>
                            <td>{{ $penjualanDetail->penjualan->diterima }}</td>
                        </tr>
            @endforeach
        </tbody>
    </table>

</body>

</html>
