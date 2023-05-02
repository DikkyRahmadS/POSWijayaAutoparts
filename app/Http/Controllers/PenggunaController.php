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

        return view('pengguna.index');
    }

    public function data()
    {
        $user = User::orderBy('id', 'desc')->get();

        return datatables()
            ->of($user)
            ->addIndexColumn()
            ->addColumn('name', function ($user) {
                return  ' <div class="symbol symbol-45px me-5 ml-1">
                                    <img src=" ' . Storage::url($user->image) . '" alt="" />
                                </div>' . $user->name;
            })
            ->addColumn('role', function ($user) {
                return ' <span class="badge badge-lg ' . ($user->role ? 'badge-light-danger' : 'badge-light-primary') . '">
        ' . ($user->role ? 'Admin' : 'Karyawan') . ' </span> ';
            })
            ->addColumn('aksi', function ($user) {
                return '
                <div class="text-end">
                    <button onclick="editForm(`' . route('pengguna.update', $user->id) . '`)" class="btn btn-xs btn-bg-light">
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
                    <button onclick="deleteData(`' . route('pengguna.destroy', $user->id) . '`)" class="btn btn-xs btn-bg-light"><i class="fa fa-trash"></i></button>
                </div>';
            })
            ->rawColumns(['name', 'role', 'aksi'])
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
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required',
            'role' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
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

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pengguna = User::find($id);
        return response()->json($pengguna);
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

        $pengguna = User::find($id);
        $pengguna->name = $request->name;
        $pengguna->email = $request->email;
        if ($request->password)
            $pengguna->password = Hash::make($request->password);
        $pengguna->role = $request->role;
        if ($request->hasFile('image')) {
            Storage::disk('public')->deleteDirectory("uploads/pengguna/$pengguna->id");
            $fotoExtension = $request->file('image')->extension();
            $fotoFilename = Str::slug("$pengguna->id-$pengguna->name") . '.' . $fotoExtension;

            $fotoLocation = "uploads/pengguna/$pengguna->id/foto";

            $fotoPath = $request->file('image')->storeAs($fotoLocation, $fotoFilename, 'public');

            $pengguna->image = $fotoPath;
        }
        $pengguna->save();
        // dd($pengguna);

        return response()->json('Data berhasil disimpan', 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pengguna =  User::find($id);
        Storage::disk('public')->deleteDirectory("uploads/pengguna/$pengguna->id");

        $pengguna->delete();
        return response(null, 204);
    }
}
