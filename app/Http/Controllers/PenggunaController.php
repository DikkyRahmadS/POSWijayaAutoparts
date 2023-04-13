<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->query('keyword');
        $datas = User::where('name', 'Like', '%' . $keyword . '%')
            ->orWhere('password', 'LIKE', "%$keyword%");

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
        $model = new User();
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
            'name' => 'required',
            'email' => 'required',
            'password' => 'required',
            'role' => 'required',
        ]);

        $pengguna = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make(
                $request->password
            ),
            'role' => $request->role,
        ]);


        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$pengguna->id-$pengguna->name") . '.' . $fotoExtension;

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
        $model = User::find($id);
        return view('pengguna.show', compact(
            'model'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = User::find($id);
        return view('pengguna.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {

        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        if ($request->password)
            $pengguna->password = Hash::make($request->password);
        $pengguna->role = $request->role;

        if ($request->hasFile('image')) {
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$pengguna->id-$pengguna->name") . '.' . $fotoExtension;

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
        $pengguna =  User::find($id);
        Storage::disk('public')->deleteDirectory("uploads/pengguna/$pengguna->id");

        $pengguna->delete();
        return redirect('pengguna')->with('success', 'Data Terhapus');
    }
}
