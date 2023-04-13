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

        $keyword = request()->query('keyword');
        $datas = Produk::where('nama_produk', 'Like', '%' . $keyword . '%');

        $datas = $datas->orderBy('id', 'desc')->paginate(5);
        $datas_kategori = Kategori::all();
        return view('produk.index', compact(
            'datas',
            'keyword',
            'datas_kategori'

        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new Produk();
        // $opsi_kategori = Kategori::all();
        return view('produk.create', compact(
            'model',
            'opsi_kategori'
        ));
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
            'kategori_id' => "required"


        ]);

        $produk = Produk::create([
            'kode_produk' => $request->kode_produk,
            'nama_produk' => $request->nama_produk,
            'merk' => $request->merk,
            'berat' => $request->berat,
            'harga_jual' => $request->harga_jual,
            'kategori_id' => $request->kategori_id,


        ]);

        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$produk->id-$produk->nama_produk") . '.' . $fotoExtension;

            $fotoLocation = "uploads/produk/$produk->id/foto";

            $fotoPath = $request->file('image')->storeAs($fotoLocation, $fotoFilename, 'public');

            $produk->image = $fotoPath;

            $produk->save();
        }

        return redirect('produk')->with('success', 'Data Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
        $model = Produk::find($id);
        return view('produk.show', compact(
            'model'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
        $model = Produk::find($id);
        return view('produk.edit', compact(
            'model'
        ));
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


        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$produk->id-$produk->nama_produk") . '.' . $fotoExtension;

            $fotoLocation = "uploads/produk/$produk->id/foto";

            $fotoPath = $request->file('image')->storeAs($fotoLocation, $fotoFilename, 'public');

            $produk->image = $fotoPath;
        }
        $produk->save();

        return redirect('produk')->with('success', 'Data Disimpan');
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
        return redirect('produk')->with('success', 'Data Terhapus');
    }
}
