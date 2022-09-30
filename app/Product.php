<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'tbl_barangs';

    protected $fillable = [
        'id_kategori',
        'id_restoran',   /* => Carbon::createFromFormat('d-m-Y', $request->id_restoran), */
        'gambar',
        'nama_barang',
        'keterangan',
        'deskripsi',
        // 'stok',
        'harga',
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Category', 'id_kategori');
    }
    public function restaurant()
    {
        return $this->belongsTo('App\Restaurant', 'id_restoran', 'id_restoran');
    }

}
