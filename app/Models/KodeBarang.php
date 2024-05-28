<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KodeBarang extends Model
{

    use HasFactory;
    protected $table = 'kode_barangs'; // Assuming your table name is 'kode_barang'
    protected $primaryKey = 'id'; // Assuming 'id' is your primary key column
    protected $fillable = ['nama_kode']; // Define fillable columns
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
