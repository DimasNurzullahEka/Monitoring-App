<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index()
    {
        $totalBarangAda = Barang::where('status_barang', 'ada')->count();
        $totalBarangTidakAda = Barang::where('status_barang', 'tidak')->count();
        $totalBarangRusak = Barang::where('kondisi', 'rusak')->count();
        $totalBarangBaik = Barang::where('kondisi', 'baik')->count();
        $totalBarang = Barang::count();
        $name = auth()->user()->username;
        return view('Menu.Dashboard',compact(
            'name','totalBarang',
            'totalBarangAda','totalBarangTidakAda',
            'totalBarangBaik','totalBarangRusak'
        ));
    }
}
