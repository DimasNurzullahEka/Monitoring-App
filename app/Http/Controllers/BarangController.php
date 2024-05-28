<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\KodeBarang;
use App\Models\Lokasi;
use App\Models\type;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->query('search');

        // Jika query pencarian tidak kosong, lakukan pencarian
        if (!empty($search)) {
            $dataBarang = Barang::where('nomer_seri', 'like', '%' . $search . '%')
                                ->orWhere('nama_barang', 'like', '%' . $search . '%')
                                ->paginate(5)
                                ->appends(['search' => $search]);
        } else {
            // Jika tidak ada pencarian, ambil semua data barang dengan paginasi
            $dataBarang = Barang::paginate(12);
        }

        // Ambil nama pengguna yang sedang masuk
        $name = auth()->user()->username;
        // $tableBarang = Barang::with(['lokasi', 'type', 'kode'])->get();
        // Ambil semua data lokasi (tidak perlu jika hanya untuk menampilkan jumlah total)
        // $tableLokasi = Lokasi::all();

        // Kirim data ke view
        return view('barang.index')->with([
            // 'tableLokasi' => $tableLokasi, // Tidak perlu jika hanya untuk menampilkan jumlah total
            'barangs'=>$dataBarang,
            // 'tableBarang' => $tableBarang,
            'search' => $search,
            'name' => $name
        ]);

    }
    // public function index(Request $request)
    // {
    //     $search = $request->query('search');

    //     if (!empty($search)) {
    //         $dataBarang = Barang::where('nomer_seri', 'like', '%' . $search . '%')
    //             ->orWhere('nama_barang', 'like', '%' . $search . '%')
    //             ->paginate(10)->withQueryString(); // Retain search query string in pagination links
    //     } else {
    //         $dataBarang = Barang::paginate(10)->withQueryString(); // Retain search query string in pagination links
    //     }

    //     // Fetch barang data only if search query is empty or not provided
    //     // $dataBarangs = !empty($search) ? [] : Barang::paginate(10)->fragment('std');
    //     $tableBarang = Barang::with(['lokasi', 'type', 'kode'])->get();
    //     $name = auth()->user()->username;

    //     return view('barang.index')->with([
    //         'tableBarang'=>$tableBarang,
    //         // 'students' => $dataBarangs,
    //         'barang' => $dataBarang,
    //         'search' => $search,
    //         'name' => $name
    //     ]);
    // }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $name = auth()->user()->username;
        $datatypes = Type::all();
        $lokasis = Lokasi::all();
        $kodes = KodeBarang::all();
        return view('barang.tambah', compact('name', 'datatypes', 'lokasis', 'kodes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'nomer_seri' => 'required|unique:barangs,nomer_seri',
            'nama_barang' => 'required',
            'kodeBarang_id' => 'required|exists:kode_barangs,id',
            'lokasi_id' => 'required|exists:lokasis,id',
            'type_id' => 'required|exists:types,id',
            'status_barang' => 'required|in:ada,tidak',
            'kondisi' => 'required|in:baik,rusak',
            'tahun' => 'required',
            'keterangan' => 'required',
        ]);

        Barang::create($request->all());

        return redirect()->route('barang.success')->with('success', 'Barang berhasil ditambahkan');
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
    public function edit(Request $request, Barang $barang)
    {
        //
        $name = auth()->user()->username;
        $datatypes = Type::all();
        $lokasis = Lokasi::all();
        $kodes = KodeBarang::all();
        return view('barang.edit', compact('barang','kodes','lokasis','datatypes','name'));
    }

    /**
     * Update the specified resource in storage.
     */  public function update(Request $request, $id)
    {
        $request->validate([
            'id' => 'required|unique:barangs,id,' . $id,
            'kodeBarang_id' => 'required',
            'nomer_seri' => 'required|string|max:255',
            'nama_barang' => 'required|string|max:255',
            'lokasi_id' => 'required',
            'type_id' => 'required',
            'status_barang' => 'required',
            'kondisi' => 'required',
            'tahun' => 'required|digits:4',
            'keterangan' => 'required|string|max:255',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->id = $request->input('id');
        $barang->kodeBarang_id = $request->input('kodeBarang_id');
        $barang->nomer_seri = $request->input('nomer_seri');
        $barang->nama_barang = $request->input('nama_barang');
        $barang->lokasi_id = $request->input('lokasi_id');
        $barang->type_id = $request->input('type_id');
        $barang->status_barang = $request->input('status_barang');
        $barang->kondisi = $request->input('kondisi');
        $barang->tahun = $request->input('tahun');
        $barang->keterangan = $request->input('keterangan');

        $barang->save();

        return redirect()->route('barang.success')->with('success', 'Barang updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil dihapus');
    }
    public function success()
    {
        $name = auth()->user()->name;
        return view('barang.success', compact('name'));
    }

    public function filter(Request $request)
    {
        $category = $request->get('category');
        $filteredBarang = Barang::with(['lokasi', 'type', 'kode'])
            ->when($category, function ($query, $category) {
                return $query->whereHas('lokasi', function ($q) use ($category) {
                    $q->where('nama_lokasi', $category);
                });
            })->get();

        return response()->json(['products' => $filteredBarang]);
    }
    public function autocomplete(Request $request): JsonResponse
    {
        $fineWord = $request->get('term'); // 'term' is the key sent by Typeahead.js
        $data = Barang::select('nomer_seri', 'nama_barang', 'kodeBarang_id', 'lokasi_id', 'type_id', 'status_barang', 'kondisi', 'tahun')
            ->where('nomer_seri', 'LIKE', '%' . $fineWord . '%')
            ->get();

        return response()->json($data);
    }
}
