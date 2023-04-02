<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->query('keyword');
        //$datas = Kategori::all();
        $datas = Kategori::where('nama_kategori', 'Like', '%' . $keyword . '%');

        $datas = $datas->orderBy('id', 'desc')->paginate(5);
        return view('kategori.index', compact(
            'datas',
            'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Kategori();
        return view('kategori.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama_kategori' => 'required',
        ]);

        $model = new Kategori;
        $model->nama_kategori = $request->nama_kategori;
        $model->save();
        return redirect('kategori')->with('success', 'Data Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Kategori::find($id);
        return view('kategori.show', compact(
            'model'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Kategori::find($id);
        return view('kategori.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $model = Kategori::find($id);
        $model->nama_kategori = $request->nama_kategori;
        $model->save();
        return redirect('kategori')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model =  Kategori::find($id);
        $model->delete();
        return redirect('kategori')->with('success', 'Data Terhapus');
    }
}
