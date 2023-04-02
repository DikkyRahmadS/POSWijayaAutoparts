<?php

namespace App\Http\Controllers;

use App\Models\Pengguna;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
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

        $pengguna = Pengguna::create([
            'nama' => $request->nama,
            'pin' => $request->pin,
            'role' => $request->role,
        ]);


        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$pengguna->id-$pengguna->nama") . '.' . $fotoExtension;

            $fotoLocation = "uploads/pengguna/$pengguna->id/foto";

            $fotoPath = $request->file('image')->storeAs($fotoLocation, $fotoFilename, 'public');

            $pengguna->image = $fotoPath;

            $pengguna->save();
        }

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

        $pengguna = Pengguna::find($id);
        $pengguna->nama = $request->nama;
        $pengguna->pin = $request->pin;
        $pengguna->role = $request->role;

        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$pengguna->id-$pengguna->nama") . '.' . $fotoExtension;

            $fotoLocation = "uploads/pengguna/$pengguna->id/foto";

            $fotoPath = $request->file('image')->storeAs($fotoLocation, $fotoFilename, 'public');

            $pengguna->image = $fotoPath;
        }
        $pengguna->save();

        return redirect('pengguna')->with('success', 'Data Disimpan');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna =  Pengguna::find($id);
        Storage::disk('public')->deleteDirectory("uploads/pengguna/$pengguna->id");

        $pengguna->delete();
        return redirect('pengguna')->with('success', 'Data Terhapus');
    }
}
