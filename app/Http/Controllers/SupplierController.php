<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Supplier;

class SupplierController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $keyword = request()->query('keyword');
        //$datas = Supplier::all();
        $datas = Supplier::where('nama', 'Like', "%$keyword%")
            ->orWhere('alamat', 'LIKE', "%$keyword%")
            ->orWhere('no_hp', 'LIKE', "%$keyword%");

        $datas = $datas->orderBy('id', 'desc')->paginate(5);
        return view('supplier.index', compact(
            'datas',
            'keyword'
        ));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $model = new Supplier();
        return view('supplier.create', compact(
            'model'
        ));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $model = new Supplier();
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->no_hp = $request->no_hp;
        $model->save();
        return redirect('supplier')->with('success', 'Data Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $model = Supplier::find($id);
        return view('supplier.show', compact(
            'model'
        ));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $model = Supplier::find($id);
        return view('supplier.edit', compact(
            'model'
        ));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'nama' => 'required',
            'alamat' => 'required',
            'no_hp' => 'required',
        ]);

        $model = Supplier::find($id);
        $model->nama = $request->nama;
        $model->alamat = $request->alamat;
        $model->no_hp = $request->no_hp;
        $model->save();
        return redirect('supplier')->with('success', 'Data Diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $model =  Supplier::find($id);
        $model->delete();
        return redirect('supplier')->with('success', 'Data Terhapus');
    }
}
