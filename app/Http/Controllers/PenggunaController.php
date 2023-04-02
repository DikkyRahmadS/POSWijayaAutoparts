<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Http\Request;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->query('keyword');
        //$datas = pengguna::all();
        $datas = Pengguna::where('nama', 'Like', '%' . $keyword . '%');

        $datas = $datas->orderBy('id', 'desc')->paginate(5);
        return view('pengguna.index', compact(
            'datas',
            'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Pengguna();
        return view('pengguna.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'pin' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'role' => 'required',
        ]);
        $path = $request->file('image')->store('public/images');
        $pengguna = new Pengguna();
        $pengguna->nama = $request->nama;
        $pengguna->pin = $request->pin;
        $pengguna->role = $request->role;
        $pengguna->image = $path;
        $pengguna->save();

        return redirect('pengguna')->with('success', 'Data Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Pengguna::find($id);
        return view('pengguna.show', compact(
            'model'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Pengguna::find($id);
        return view('pengguna.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required',
            'pin' => 'required',
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'role' => 'required',
        ]);
        $pengguna = Pengguna::find($id);
        if ($request->hasFile('image')) {
            $request->validate([
                'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            ]);
            $path = $request->file('image')->store('public/images');
            $pengguna->image = $path;
        }
        $pengguna->nama = $request->nama;
        $pengguna->pin = $request->pin;
        $pengguna->role = $request->role;
        $pengguna->save();

        return redirect('pengguna')->with('success', 'Data Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model =  Pengguna::find($id);
        $model->delete();
        return redirect('pengguna')->with('success', 'Data Terhapus');
    }
}
