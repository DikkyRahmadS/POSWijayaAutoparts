<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view("produk.index");
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $model = new Produk();
        return view('produk.create', compact(
            'model'
        ));
        return view("produk.create");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $this->validate($request, [
            'nama_produk' => 'required',
            "harga_jual" => "required"
        ]);

        $model = new Produk();
        $model->nama_kategori = $request->nama_kategori;
        $model->harga_jual = $request->harga_jual;
        $model->save();
        return redirect('produk')->with('success', 'Data Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
