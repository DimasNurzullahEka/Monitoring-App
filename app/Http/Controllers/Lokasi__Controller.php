<?php

namespace App\Http\Controllers;

use App\Models\Lokasi;
use Illuminate\Http\Request;

class Lokasi__Controller extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     //
    //     $search= $request->query('search');
    //     if(!empty($search)){
    //         $dataLokasi = Lokasi::where('lokasis.nama_lokasi','like','%'.$search.'%')->orWhere('lokasis.nama_lokasi','like','%'.$search.'%')->paginate(5)->fragment('std');
    //     }else{
    //         $dataLokasi = Lokasi::paginate(10)->fragment('std');
    //     }
    //     $name = auth()->user()->username;
    //     $tableLokasi=Lokasi::all();
    //     return view('Lokasi.Index')->with([
    //         'lokasis'=>$dataLokasi,
    //         'tableLokasi' => $tableLokasi,
    //         'search' => $search,
    //         'name' => $name
    //     ]);
    // }

    public function index(Request $request)
{
    // Ambil query pencarian dari URL
    $search = $request->query('search');

    // Jika query pencarian tidak kosong, lakukan pencarian
    if (!empty($search)) {
        $dataLokasi = Lokasi::where('nama_lokasi', 'like', '%' . $search . '%')->paginate(5)->appends(['search' => $search]);
    } else {
        // Jika tidak ada pencarian, ambil semua data lokasi dengan paginasi
        $dataLokasi = Lokasi::paginate(8);
    }

    // Ambil nama pengguna yang sedang masuk
    $name = auth()->user()->username;
    // Ambil semua data lokasi (tidak perlu jika hanya untuk menampilkan jumlah total)
    // $tableLokasi = Lokasi::all();

    // Kirim data ke view
    return view('Lokasi.Index')->with([
        'lokasis' => $dataLokasi,
        // 'PaginateLokasi' => $PaginateLokasi,
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
        return view('Lokasi.tambah', compact('name'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nama_lokasi' => 'required|string|max:255',
        ]);

        Lokasi::create([
            'nama_lokasi' => $request->nama_lokasi,
        ]);

        return redirect()->route('lokasi.success')->with('success', 'Category created successfully.');
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
    public function edit(Lokasi $lokasi)
    {
        //
        $name = auth()->user()->username;
        return view('lokasi.edit', compact('name','lokasi'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        // Validation
        $request->validate([
            'id' => 'required|integer|unique:lokasis,id,' . $id,
            'nama_lokasi' => 'required|string|max:255',
        ]);

        // Find the existing lokasi
        $lokasi = Lokasi::findOrFail($id);

        // Update the lokasi with the new values
        $lokasi->id = $request->input('id');
        $lokasi->nama_lokasi = $request->input('nama_lokasi');

        // Save the updated lokasi
        $lokasi->save();

        // Redirect with a success message
        return redirect()->route('lokasi.success')->with('success', 'Lokasi updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $lokasi = Lokasi::findOrFail($id);
        $lokasi->delete();

        return redirect()->route('lokasi.index')->with('success', 'Lokasi deleted successfully.');
    }
    public function success()
    {
        $name = auth()->user()->username;
        return view('Lokasi.success',compact('name'));
    }

}
