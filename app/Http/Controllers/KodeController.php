<?php

namespace App\Http\Controllers;

use App\Models\KodeBarang;
use Illuminate\Http\Request;

class KodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil query pencarian dari URL
        $search = $request->query('search');

        // Jika query pencarian tidak kosong, lakukan pencarian
        if (!empty($search)) {
            $kodeBarang = KodeBarang::where('nama_kode', 'like', '%' . $search . '%')->paginate(5)->appends(['search' => $search]);
        } else {
            // Jika tidak ada pencarian, ambil semua data lokasi dengan paginasi
            $kodeBarang = KodeBarang::paginate(8);
        }

        // Ambil nama pengguna yang sedang masuk
        $name = auth()->user()->username;

        // Ambil semua data lokasi (tidak perlu jika hanya untuk menampilkan jumlah total)
        // $tableLokasi = Lokasi::all();

        // Kirim data ke view
        return view('KBarang.index')->with([
            'kodeBarangs' => $kodeBarang,
            // 'tableLokasi' => $tableLokasi, // Tidak perlu jika hanya untuk menampilkan jumlah total
            'search' => $search,
            'name' => $name
        ]);
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $name = auth()->user()->username;
        return view('KBarang.tambah', compact('name'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_kode' => 'required|string|max:255',
        ]);

        KodeBarang::create([
            'nama_kode' => $request->nama_kode,
        ]);

        return redirect()->route('kode.success')->with('success', 'Category created successfully.');
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
    public function edit($id)
    {
        $name = auth()->user()->username;
        $kode = KodeBarang::findOrFail($id); // Assuming your model is named Kode and your primary key is 'id'
        return view('KBarang.edit', compact('kode','name'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, KodeBarang $kode)
    {
        //
        $request->validate([
            'nama_kode' => 'required|unique:kode_barangs,nama_kode,' . $kode->id,
        ]);

        $kode->update($request->all());

        return redirect()->route('kode.success')->with('success', 'Lokasi berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy( $id)
    {
        //

        $kode = KodeBarang::findOrFail($id);
        $kode->delete();

        return redirect()->route('kode.index')->with('success', 'Lokasi deleted successfully.');
    }
    public function success()
    {
        $name = auth()->user()->username;
        return view('KBarang.success',compact('name'));
    }
}
