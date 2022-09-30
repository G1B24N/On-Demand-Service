<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Restaurant extends Model
{
    protected $table = 'tbl_restorans';

    protected $fillable = [
        'id_user',
        'nama_restoran',
        'deskripsi',
        'no_hp',
        'email',
        'waktu_pemesanan',
        'kategori',
        'kota',
        'alamat',
        'zipcode',
        'maps',
        'foto',
        'cover',
        'author',
        'jam_kerja',
        'latitude',
        'longitude',
    ];

    public function kategori()
    {
        return $this->belongsTo('App\Category', 'kategori', 'nama_kategori');
    }
    protected $primaryKey = 'id_restoran';

    public function author()
    {
        return $this->belongsTo('App\User', 'author', 'id');
    }

    public function user()
    {
        return $this->belongsTo('App\User', 'id_user', 'id');
    }
}
