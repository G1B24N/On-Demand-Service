<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $table = 'tbl_pesanans';

    protected $fillable = [
        'user_id',
		// 'id_restoran',
		'tanggal',
		'status',
		'kode',
		'jumlah_harga'
    ];

	protected $guard = [];
    public function user()
	{
	      return $this->belongsTo('App\User','user_id', 'id');
	}

	public function pesanan_detail()
	{
	     return $this->hasMany('App\OrderDetail','pesanan_id', 'id');
	}

	public function restaurant()
	{
		return $this->belongsTo('App\Restaurant', 'id_restoran', 'nama_restoran');
	}

	public function product()
	{
		return $this->belongsTo('App\Product', 'nama_barang');
	}

	// public function pesanan_aktif() {
	// 	return $this->status->count();
	// }
}
