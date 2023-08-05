<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class PenjualanModel extends Model
{
    use HasFactory;
    protected $table = "penjualan";
    protected $fillable = [
        'id_barang',
        'tgl_masuk',
        'jumlah',
        'suplier',
    ];

    public function scopeTotalHarga()
    {
        $query = BarangModel::join('penjualan', 'penjualan.id_barang', '=', 'barang.id_barang')->get();
        return $query;
    }


}
