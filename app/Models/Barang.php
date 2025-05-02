<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    protected $table = 'md_barang';
    protected $primaryKey = 'id_barang';
    public $timestamps = false;
    
    protected $fillable = [
        'nama_barang', 'kode_barang', 'kategori_barang',
        'lokas_barang', 'stock_barang', 'satuan_barang'
    ];

    public function mutasis()
    {
        return $this->hasMany(Mutasi::class, 'barang_id', 'id_barang');
    }
}
