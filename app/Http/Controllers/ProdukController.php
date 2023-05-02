<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $kategori = Kategori::all()->pluck('nama_kategori', 'id');

        return view('produk.index', compact('kategori'));
    }

    public function data()
    {
        $produk = Produk::leftJoin('kategoris', 'kategoris.id', 'produks.kategori_id')
            ->select('produks.*', 'nama_kategori')
            ->orderBy('id', 'desc')
            ->get();

        return datatables()
            ->of($produk)
            ->addIndexColumn()
            ->addColumn('kode_produk', function ($produk) {
                return  '<div class="badge badge-light-success">' . $produk->kode_produk . '</div> ';
            })
            ->addColumn('nama_produk', function ($produk) {
                return  ' <div class="d-flex"> <div class="symbol symbol-45px me-5 ml-1">
                                    <img src=" ' . Storage::url($produk->image) . '" alt="" />
                                </div> <div class="ms-2">' . $produk->nama_produk . '<div class="text-muted fs-7 fw-bolder">' . $produk->merk . '</div></div></div>';
            })
            ->addColumn('harga_jual', function ($produk) {
                return 'Rp. ' . format_uang($produk->harga_jual);
            })
            ->addColumn('aksi', function ($produk) {
                return '
                <div class="text-end">
                    <button onclick="editForm(`' . route('produk.update', $produk->id) . '`)" class="btn btn-xs btn-bg-light">
                                    <span class="svg-icon svg-icon-3 editbtn">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                                            viewBox="0 0 24 24" fill="none">
                                            <path opacity="0.3"
                                                d="M21.4 8.35303L19.241 10.511L13.485 4.755L15.643 2.59595C16.0248 2.21423 16.5426 1.99988 17.0825 1.99988C17.6224 1.99988 18.1402 2.21423 18.522 2.59595L21.4 5.474C21.7817 5.85581 21.9962 6.37355 21.9962 6.91345C21.9962 7.45335 21.7817 7.97122 21.4 8.35303ZM3.68699 21.932L9.88699 19.865L4.13099 14.109L2.06399 20.309C1.98815 20.5354 1.97703 20.7787 2.03189 21.0111C2.08674 21.2436 2.2054 21.4561 2.37449 21.6248C2.54359 21.7934 2.75641 21.9115 2.989 21.9658C3.22158 22.0201 3.4647 22.0084 3.69099 21.932H3.68699Z"
                                                fill="currentColor" />
                                            <path
                                                d="M5.574 21.3L3.692 21.928C3.46591 22.0032 3.22334 22.0141 2.99144 21.9594C2.75954 21.9046 2.54744 21.7864 2.3789 21.6179C2.21036 21.4495 2.09202 21.2375 2.03711 21.0056C1.9822 20.7737 1.99289 20.5312 2.06799 20.3051L2.696 18.422L5.574 21.3ZM4.13499 14.105L9.891 19.861L19.245 10.507L13.489 4.75098L4.13499 14.105Z"
                                                fill="currentColor" />
                                        </svg>
                                    </span>
                    </button>
                    <button onclick="deleteData(`' . route('produk.destroy', $produk->id) . '`)" class="btn btn-xs btn-bg-light"><i class="fa fa-trash"></i></button>
                </div>';
            })
            ->rawColumns(['kode_produk', 'nama_produk', 'aksi'])
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
        //
        $request->validate([
            'kode_produk' => 'required',
            'nama_produk' => 'required',
            'merk' => 'required',
            'berat' => 'required',
            'harga_jual' => 'required',
            'kategori_id' => 'required',
            'stok' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',


        ]);

        $produk = Produk::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'berat' => $request->berat,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,
            'stok' => $request->stok,


        ]);

        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$produk->id-$produk->nama_produk") . '.' . $fotoExtension;

            $fotoLocation = "uploads/produk/$produk->id/foto";

            $fotoPath = $request->file('image')->storeAs($fotoLocation, $fotoFilename, 'public');

            $produk->image = $fotoPath;

            $produk->save();
        }

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

        $produk = Produk::find($id);

        return response()->json($produk);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //

        $produk = Produk::find($id);
        $produk->kode_produk = $request->kode_produk;
        $produk->nama_produk = $request->nama_produk;
        $produk->merk = $request->merk;
        $produk->berat = $request->berat;
        $produk->harga_jual = $request->harga_jual;
        $produk->kategori_id = $request->kategori_id;
        $produk->stok = $request->stok;


        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$produk->id-$produk->nama_produk") . '.' . $fotoExtension;

            $fotoLocation = "uploads/produk/$produk->id/foto";

            $fotoPath = $request->file('image')->storeAs($fotoLocation, $fotoFilename, 'public');

            $produk->image = $fotoPath;
        }
        $produk->save();

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
        $produk =  Produk::find($id);
        Storage::disk('public')->deleteDirectory("uploads/produk/$produk->id");

        $produk->delete();
        return response(null, 204);
    }
}
