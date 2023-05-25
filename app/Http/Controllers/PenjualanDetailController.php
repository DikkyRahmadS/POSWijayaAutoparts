<?php

namespace App\Http\Controllers;

use App\Models\Produk;
use App\Models\Kategori;
use App\Models\PenjualanDetail;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PenjualanDetailController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->query('keyword');
        $datas = Produk::where('nama_produk', 'Like', '%' . $keyword . '%');

        $datas = $datas->orderBy('id', 'desc')->where('stok', '>', 0)->paginate(3);
        // Cek apakah ada transaksi yang sedang berjalan
        if ($id_penjualan = session('id')) {
            $penjualan = Penjualan::find($id_penjualan);

            return view("kasir.index", compact(
                'datas',
                'keyword',
                'penjualan',
                'id_penjualan'
            ));
        } else {
            if (auth()->user()->role == 1) {
                return redirect()->route('transaksi.baru');
            } else {
                return redirect()->route('dashboard');
            }
        }
    }

    public function data($id)
    {
        $detail = PenjualanDetail::with('produk')
            ->where('penjualan_id', $id)
            ->get();

        $data = array();
        $total = 0;
        $total_item = 0;

        foreach ($detail as $item) {
            $row = array();
            $row['nama_produk'] = '<div class="d-flex align-items-center">
                                    <img src=" ' . Storage::url($item->produk->image) . '"  class="w-50px h-50px rounded-3 me-3" alt="" />
                                    <span class="fw-bold text-gray-800 cursor-pointer text-hover-primary fs-6 me-1">' . $item->produk['nama_produk'] . '</span>';
            $row['jumlah']      = '<div class="col-xs-2"> <input type="number" class="form-control input-sm quantity" data-id="' . $item->id . '" value="' . $item->jumlah . '"></div>';
            $row['subtotal']    = '<span class="fw-bold text-primary fs-3" >Rp. ' . format_uang($item->subtotal) . '</span>';
            $row['aksi']        = '<div class="btn-group ">
                                    <button onclick="deleteData(`' . route('transaksi.destroy', $item->id) . '`)" class="btn btn-xs btn-danger btn-flat"><i class="fa fa-trash"></i></button>
                                </div>';
            $data[] = $row;

            $total += $item->harga_jual * $item->jumlah;
            $total_item += $item->jumlah;
        }
        $data[] = [
            'nama_produk' => '
                <div class="total hide">' . $total . '</div>
                <div class="total_item hide">' . $total_item . '</div>',
            'jumlah'      => '',
            'subtotal'    => '',
            'aksi'        => '',
        ];

        return datatables()
            ->of($data)
            ->addIndexColumn()
            ->rawColumns(['aksi', 'nama_produk', 'jumlah', 'subtotal'])
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $produk = Produk::where('id', $request->produk_id)->first();
        if (!$produk) {
            return response()->json('Data gagal disimpan', 400);
        }

        $detail = new PenjualanDetail();
        $detail->penjualan_id = $request->penjualan_id;
        $detail->produk_id = $produk->id;
        $detail->harga_jual = $produk->harga_jual;
        $detail->jumlah = 1;
        $detail->subtotal = $produk->harga_jual;
        $detail->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(PenjualanDetail $penjualanDetail)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(PenjualanDetail $penjualanDetail)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $detail = PenjualanDetail::find($id);
        $detail->jumlah = $request->jumlah;
        $detail->subtotal = $detail->harga_jual * $request->jumlah;
        $detail->update();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $detail = PenjualanDetail::find($id);
        $detail->delete();

        return response(null, 204);
    }
    public function loadForm($diskon = 0, $total = 0, $diterima = 0)
    {
        $bayar   = $total - ($diskon / 100 * $total);
        $kembali = ($diterima != 0) ? $diterima - $bayar : 0;
        $data    = [
            'totalrp' => format_uang($total),
            'bayar' => $bayar,
            'bayarrp' => format_uang($bayar),
            'terbilang' => ucwords(terbilang($bayar) . ' Rupiah'),
            'kembalirp' => format_uang($kembali),
            'kembali_terbilang' => ucwords(terbilang($kembali) . ' Rupiah'),
        ];

        return response()->json($data);
    }
}
