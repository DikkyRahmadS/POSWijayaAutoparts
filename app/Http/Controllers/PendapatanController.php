<?php

namespace App\Http\Controllers;

use App\Models\Pendapatan;
// use App\Models\Kategori;
use Illuminate\Http\Request;

class PendapatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $datas = Pendapatan::all();
        return view("pendapatan.index", compact("datas"));
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
    }

    /**
     * Display the specified resource.
     */
    public function show(Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Pendapatan $pendapatan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Pendapatan $pendapatan)
    {
        //
    }
}
