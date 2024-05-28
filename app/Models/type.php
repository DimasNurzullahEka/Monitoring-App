<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class type extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_type',
    ];
    public function barangs()
    {
        return $this->hasMany(Barang::class);
    }
}
