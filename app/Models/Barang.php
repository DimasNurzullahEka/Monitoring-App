<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $fillable = [
        'nomer_seri',
        'nama_barang',
        'kodeBarang_id',
        'type_id',
        'lokasi_id',
        'status_barang',
        'kondisi',
        'tahun',
        'keterangan'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function lokasi()
    {
        return $this->belongsTo(Lokasi::class);
    }
    public function kode()
    {
        return $this->belongsTo(KodeBarang::class, 'kodeBarang_id');
    }

}
